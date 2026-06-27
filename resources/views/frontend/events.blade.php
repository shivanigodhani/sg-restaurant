<!-- ============ SPECIAL EVENTS ============ -->
<section id="events" class="section events-section">
    <div class="container">
        <div class="text-center mb-5">
            <p class="eyebrow eyebrow--center" data-aos="fade-up">
                <span class="eyebrow-line"></span>
                Special Events
                <span class="eyebrow-line"></span>
            </p>
            <h2 class="section-title" data-aos="fade-up" data-aos-delay="80">
                Evenings worth planning around
            </h2>
        </div>
        <div class="row gy-4">
            @forelse($events as $event)
                <div class="col-md-4" data-aos="fade-up">
                    <div class="event-card">
                        <a href="{{ route('events.show', $event->slug) }}">
                            <div class="event-card-img">
                                <img src="{{ asset('uploads/events/'.$event->image) }}"
                                     alt="{{ $event->title }}">
                            </div>
                        </a>
                        <div class="event-card-body">
                            <span class="event-day">
                                {{ \Carbon\Carbon::parse($event->start_date)->format('d M Y') }}
                                @if($event->end_date)
                                    - {{ \Carbon\Carbon::parse($event->end_date)->format('d M Y') }}
                                @endif
                            </span>
                            <h3>
                                <a href="{{ route('events.show', $event->slug) }}"
                                   class="text-decoration-none text-dark">
                                    {{ $event->title }}
                                </a>
                            </h3>
                            <p>
                                {{ \Illuminate\Support\Str::limit(strip_tags($event->description), 100) }}
                            </p>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 text-center">
                    <h5>No upcoming events found.</h5>
                </div>
            @endforelse
        </div>
    </div>
</section>