<section class="events-list">
  <h2 class="heading h4">
    <?php echo $events_title; ?>
  </h2>
  <ul class="space-y-1">
    <?php
      if ($all_events):
        foreach ($all_events as $event): ?>
         <li class="box p-1 space-y-0.5">
        <div class="uppercase small">
          <?php echo $event['type']; ?>' Event
        </div>
        <p class="heading h5">
          <?php echo format_date($event['event_date']); ?>
        </p>
        <p class="paragraph">
          <?php echo $event['event_location']; ?>
          <?php if ($event['event_note']) { echo '*'; } ?> | <?php echo $event['event_general_location'] ?>
        </p>
        <div class="dflex space-x-1">
          <span>
            Start: <strong><?php echo $event['event_start_time']; ?></strong>
          </span>
          <span>
            End: <strong><?php echo $event['event_end_time']; ?></strong>
          </span>
        </div>
        <?php if ($event['event_note']) { ?>
          <div class="event-item-content__note">
            * <?php echo $event['event_note_detail']; ?>
          </div>
        <?php } ?>
    </li>
    <?php endforeach; else: ?>
      <li>
        <p class="heading h5">No Events Upcoming</p>
      </li>
    <?php endif; ?>
  </ul>
  <?php if($show_link): ?>
    <a class="dinline-block button button--outline mt-1" href="/events">View All Events</a>
  <?php endif; ?>
</section>
