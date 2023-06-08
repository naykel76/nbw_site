<x-gotime-app-layout layout="{{ config('naykel.template') }}" class="c-py-5-3-2" pageTitle="Welcome">

    <section>
        <div class="container">
            <h2>NayKel Naming Conventions</h2>

            Database tables are plural, Table components are singular.

            <code>Courses</code> and <code>CourseTable</code>

        </div>
    </section>

    <div class="container mb-3">
        <div class="flex va-c space-between bx">
            <svg class="txt-green" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <path d="M10,0A10,10,0,1,0,20,10,10.011,10.011,0,0,0,10,0Zm5.575,6.665L9.421,13.588a.77.77,0,0,1-1.056.09L4.519,10.6A.769.769,0,0,1,5.48,9.4l3.276,2.62,5.669-6.377a.769.769,0,0,1,1.15,1.023Z"></path>
            </svg>
            <div class="fg1 mx">
                Your enrolment was successful. You can unlock and access your courses from the student dashboard
            </div>
            <svg class="close" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                <path d="M20,.909,19.091,0,10,9.091.909,0,0,.909,9.091,10,0,19.091.909,20,10,10.909,19.091,20,20,19.091,10.909,10Z"></path>
            </svg>
        </div>
    </div>

    <div class="container maxw-400">
        <div class="flex va-space-between bx">
            <div >
                <svg class="txt-green" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <path d="M10,0A10,10,0,1,0,20,10,10.011,10.011,0,0,0,10,0Zm5.575,6.665L9.421,13.588a.77.77,0,0,1-1.056.09L4.519,10.6A.769.769,0,0,1,5.48,9.4l3.276,2.62,5.669-6.377a.769.769,0,0,1,1.15,1.023Z"></path>
                </svg>
            </div>
            <div class="fg1">
                Your enrolment was successful. You can unlock and access your courses from the student dashboard
            </div>
            <div>
                <svg class="close" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                    <path d="M20,.909,19.091,0,10,9.091.909,0,0,.909,9.091,10,0,19.091.909,20,10,10.909,19.091,20,20,19.091,10.909,10Z"></path>
                </svg>
            </div>
        </div>
    </div>

    <section>
        <div class="container">
            <div class="grid cols-4">
                <div class="bx h-5" style="background-color: #1E2A3A;"></div>
                <div class="bx h-5" style="background-color: #A9A9A9;"></div>
                <div class="bx h-5" style="background-color: #FFFFFF;"></div>
                <div class="bx h-5" style="background-color: #D4AF37;"></div>
            </div>
        </div>
    </section>

    <section class="py-5-3-2-2">
        <div class="container">
            <h2 class="title tac">Page Layout and Design Examples</h2>
            <div class="grid cols-3-2-1 tac">
                <div>
                    <img src="/images/content/page-single-column-1.jpg" alt="Page 1 Layout Example">
                    <div class="bx bdrr-0">
                        <div class="bx-title">Single column, reduced width layout with optional top image.</div>
                        <a class="btn primary outline" href="{{ route('naykel.examples.page-single-column-1') }}">Show Me!</a>
                    </div>
                </div>

                <div>
                    <img src="/images/content/page-double-column-1.jpg" alt="Page 2 Layout Example">
                    <div class="bx bdrr-0">
                        <div class="bx-title">Double column with single side image.</div>
                        <a class="btn primary outline" href="{{ route('naykel.examples.page-double-column-1') }}">Show Me!</a>
                    </div>
                </div>
                {{--
                <div>
                    <img src="/images/content/page-layout-3.jpg" alt="Page 3 Layout Example">
                    <div class="bx bdrr-0">
                        <div class="bx-title">Double column with top image and side column.</div>
                        <a class="btn primary outline" href="{{ route('naykel.examples.page-3') }}">Show Me!</a>
            </div>
        </div>
        <div>
            <img src="/images/content/banner-layout.jpg" alt="Page 4 Layout Example">
            <div class="bx bdrr-0">
                <div class="bx-title">Top banner with full width content.</div>
                <a class="btn primary outline" href="{{ route('naykel.examples.page-4') }}">Show Me!</a>
            </div>
        </div> --}}
        </div>
        </div>
    </section>


</x-gotime-app-layout>
