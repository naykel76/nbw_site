<x-gotime-app-layout layout="app" class="markdown py-5-3-2-2">

    <div class="container">


        <div class="my">
            <div class="flex space-x">
                <p><strong>Special Start:</strong> {{ $startDiscount }}</p>
                <p><strong>Special End:</strong> {{ $endDiscount }}</p>
                <p><strong>Date Time:</strong> {{ $currentDateTime }}</p>
            </div>

            <p><strong>Original Price: </strong> ${{ $price }}</p>
            <p><strong>Discounted Price: </strong> ${{ $discountedPrice }}</p>

        </div>

        <div class="dark flex items-center justify-center space-x" x-data="timer(new Date('2023-06-10'))" x-init="init();">
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
            function timer(expiry) {
                return {
                    expiry: expiry,
                    remaining: null,
                    init() {
                        this.setRemaining()
                        setInterval(() => {
                            this.setRemaining();
                        }, 1000);
                    },
                    setRemaining() {

                        const currentTime = new Date().getTime();
                        const serverTime = new Date(currentTime); // Use the server time here
                        const diff = this.expiry - serverTime.getTime();
                        this.remaining = parseInt(diff / 1000);

                        // const currentTime = new Date().getTime();
                        // const brisbaneTime = new Date(currentTime + (10 * 60 * 60 * 1000)); // Add 10 hours for Brisbane time (+10 GMT)
                        // const diff = this.expiry - brisbaneTime.getTime();
                        // this.remaining = parseInt(diff / 1000);
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
    </div>

</x-gotime-app-layout>
