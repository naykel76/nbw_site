<x-gotime-app-layout layout="app" hasContainer class="markdown py-5-3-2-2">

    <div class="bx my">
        <div class="space-y-05">
            <div> <span class="inline-flex w-5"><strong>Current:</strong></span>{{ $currentDate }}</div>
            <div> <span class="inline-flex w-5"><strong>Start:</strong></span>{{ $startDate }}</div>
            <div> <span class="inline-flex w-5"><strong>End:</strong></span>{{ $endDate }}</div>
        </div>
    </div>

    <div class="txt-red"></div>
    <div class="dark flex items-center justify-center space-x"
        x-data="countDown(
            new Date('{{ $startDate->toISOString() }}')
            {{-- new Date('{{ $currentDate->toDateString() }}'), --}}
            {{-- new Date('{{ $startDate->toDateString() }}') --}}
            )"
        x-init="init();">
        <div class="flex flex-col items-center">
            <span x-text="time().days" class="txt-3"></span>
            <span class="mt-2">Days</span>
        </div>
        <div class="flex flex-col items-center">
            <span x-text="time().hours" class="txt-3"></span>
            <span class="mt-2">Hours</span>
        </div>
        <div class="flex flex-col items-center">
            <span x-text="time().minutes" class="txt-3">6</span>
            <span class="mt-2">Minutes</span>
        </div>
        <div class="flex flex-col items-center">
            <span x-text="time().seconds" class="txt-3"></span>
            <span class="mt-2">Seconds</span>
        </div>
    </div>

    <script>
        function countDown(start) {
            return {
                start: start,
                remaining: null,
                init() {
                    this.setRemaining()
                    setInterval(() => {
                        this.setRemaining();
                    }, 1000);
                },
                setRemaining() {

                    const utcTimestamp = Date.now(); // Output: 1686256888210
                    const localFromTimestamp = new Date(utcTimestamp);
                    const utcString = localFromTimestamp.toISOString();

                    // console.log('utcTimestamp: ' + utcTimestamp);

                    const diff = this.start - utcTimestamp + 1000000000;
                    this.remaining = parseInt(diff / 1000);
                },
                days() {
                    return {
                        value: this.remaining / 86400,
                        remaining: this.remaining % 86400
                    };
                },
                hours() {
                    return {
                        value: this.days().remaining / 3600,
                        remaining: this.days().remaining % 3600
                    };
                },
                minutes() {
                    return {
                        value: this.hours().remaining / 60,
                        remaining: this.hours().remaining % 60
                    };
                },
                seconds() {
                    return {
                        value: this.minutes().remaining,
                    };
                },
                format(value) {
                    return ("0" + parseInt(value)).slice(-2)
                },
                time() {
                    return {
                        days: this.format(this.days().value),
                        hours: this.format(this.hours().value),
                        minutes: this.format(this.minutes().value),
                        seconds: this.format(this.seconds().value),
                    }
                },
            }
        }

    </script>

</x-gotime-app-layout>
