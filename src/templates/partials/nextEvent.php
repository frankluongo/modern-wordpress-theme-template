<?php  function next_event($event_details, $event_type) { ?>
  <article class="card text-align-center space-y-1 py-1 px-2">
    <header>
      <h2 class="h3 heading uppercase weight-700"> Next <?php echo $event_type; ?>' Event</h2>
    </header>
      <?php if ($event_details) { ?>
        <section>
          <p class="h4">
            <?php echo format_date($event_details['event_date']); ?>
          </p>
        </section>
        <div class="next-event-content__location">
          <?php echo $event_details['event_location']; ?> |
          <?php echo $event_details['event_general_location']; ?>
        </div>
        <div class="dflex space-x-1 justify-center">
          <div>
            Start:
            <strong>
              <?php echo $event_details['event_start_time']; ?>
            </strong>
          </div>
          <div>
            End:
            <strong>
              <?php echo $event_details['event_end_time']; ?>
            </strong>
          </div>
        </div>
      <?php } else  { ?>
        <p class="paragraph">
          No Events Upcoming! Check back soon.
        </p>
      <?php } ?>
  </article>
<?php } ?>
