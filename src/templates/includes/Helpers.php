<?php

function console_log( $data ){
  echo '<script>';
  echo 'console.log('. json_encode( $data ) .')';
  echo '</script>';
}

function format_date( $date ) {
  return date('l, F jS', strtotime($date));
}

function make_excerpt($string) {
  $processed_string = strip_tags($string);
  $processed_string = substr($processed_string, 0, 250);
  $processed_string = "$processed_string...";
  return $processed_string;
}

function is_on_homepage() {
  if (is_front_page()) {
    echo 'footer--homepage';
  }
}

function render_navigation($menu_location = 'header') {
  $menu = array (
    'theme_location' => 'header_nav',
    'container' => false,
    'items_wrap' => '<ul class="navigation__list '.$menu_location.'__navigation-list">%3$s</ul>'
  );
  wp_nav_menu( $menu );
}

function render_excerpt() {
  $excerpt = get_the_excerpt();
  $excerpt_length = strlen($excerpt);
  $content = strip_tags(get_the_content());
  $content_length = strlen($content);

  if ($excerpt_length < 1 and $content_length < 1) {
    echo 'This biography text is forthcoming! Please check back later to learn more.This biography text is forthcoming! Please check back later to learn more.';
    return;
  }

  if ($excerpt_length > 0) {
    echo $excerpt;
    return;
  }

  echo make_excerpt($content);
  return;
}

class EventsBuilder {
  // Constructor
  public function __construct($type) {
    $this->type = $type;
    $this->events = get_field('events_calendar', 'option');
    $this->selected_events = array_filter($this->events, array($this, 'filter_events_by_type'));
  }

  public function get_next_event() {
    if (!$this->selected_events) return NULL;
    $upcoming_events = $this->get_upcoming_events();
    if (count($upcoming_events) < 1) return NULL;
    usort($upcoming_events, array($this, 'sort_by_date'));
    return $upcoming_events[0];
  }

  public function get_all_events() {
    $events = $this->events;
    usort($events, array($this, 'sort_by_date'));
    return $events;
  }

  public function get_events() {
    if (!$this->selected_events) return NULL;
    $upcoming_events = $this->get_upcoming_events();
    if (count($upcoming_events) < 1) return NULL;
    usort($upcoming_events, array($this, 'sort_by_date'));
    $first_three_events = array_slice($upcoming_events, 0, 3);
    return $first_three_events;
  }

  //
  // Private Functions
  //

  private function get_upcoming_events() {
    return array_filter($this->selected_events, array($this, 'filter_events_by_today'));
  }

  private function filter_events_by_type($event) {
    return $event['type'] === $this->type;
  }

  private function filter_events_by_today($event) {
    $today = new DateTime();
    $event_time = new DateTime($event['event_date']);

    return $event_time > $today;
  }

  private function sort_by_date($event1, $event2) {
    $date1 = new DateTime($event1['event_date']);
    $date2 = new DateTime($event2['event_date']);
    return $date1 > $date2;
  }
}
