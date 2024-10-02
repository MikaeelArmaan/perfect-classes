@extends('frontend.layouts.app')

@section('content')
   
    <section class=" ">
        <div class="container records ">
            <div class="row">
                <div class="col-md-6 col-lg-6">
                    <h3 class="achivements">Our <br><span class="text-orange">30+ years</span> of achievements</h3>
                </div>
                <div class="col-md-6 col-lg-6">
                    <div class="record-grid">
                        <div class="students bg-purple-light"><span class="record text-purple">100+</span><span class="label text-purple">Students(HSC) scored 80% & above</span></div>
                        <div class="faculties bg-light-blue"><span class="record text-g-blue">30+</span><span class="label text-g-blue">Professionals (CA/CMA/CS)</span></div>
                        <div class="schools bg-purple-light"><span class="record text-purple">50+</span><span class="label text-purple">Students(TYBCOM) scored 80% & above</span></div>
                        <div class="institutes bg-light-blue"><span class="record text-g-blue">30+</span><span class="label text-g-blue">Students(SSC) scored 80% & above</span></div>
                    </div>
                </div>
               
            </div>
        </div>
    </section>


   

    <section class="why-pc-educare">
        <div class="container">
            <div class="row">
            <div class="col-md-12">
                <h3 class="text-center">Why <span class="text-light-purple">Perfect classes</span></h3>
                <p class="text-center">Because we are a growth-driven platform and upskill our students to achieve something big and great.</p>
            </div>
            </div>
            <div class="row g-4">
            <div class="col-lg-4 col-md-6">
                <div class="mt-card bg-creame">
                    <img src="{{asset('assets/images/icons/icon-experience.svg'); }}" alt="icon">
                    <h5>Experienced Faculty with industry knowledge</h5>
                    <p>Our faculty of industry experts ensure that the knowledge passed onto students is not only theoretical but also practically useful.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="mt-card bg-light-blue">
                    <img src="{{asset('assets/images/icons/icon-comprehensive-study.svg'); }}" alt="icon">
                    <h5>Comprehensive Study Materials</h5>
                    <p>Our all-inclusive syllabus and study material make certain that Perfect classes students are ready to take on the industry by storm.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="mt-card bg-creame">
                    <img src="{{asset('assets/images/icons/icon-technology.svg'); }}" alt="icon">
                    <h5>Technology Added Teaching (TAT)</h5>
                    <p>When education is inculcated along with technology, the seal on technique is set to success.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="mt-card  bg-light-blue">
                    <img src="{{asset('assets/images/icons/icon-mapped-content.svg'); }}" alt="icon">
                    <h5>Curriculum Mapped Audio-Visual Content</h5>
                    <p>Our system of audio-visual teaching of curriculum gives surety that the syllabus is interesting as well as remembered.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="mt-card bg-creame">
                    <img src="{{asset('assets/images/icons/icon-assessments.png'); }}" alt="icon">
                    <h5>Assessments &amp; Analytics for Growth</h5>
                    <p>Every student is different, and their growth is measured in many ways. Our assessment plans and our analytics weigh in all the aspects of a student’s performance.</p>
                </div>
            </div>
            <div class="col-lg-4 col-md-6">
                <div class="mt-card bg-light-blue">
                    <img src="{{asset('assets/images/icons/icon-customer-delight.svg'); }}" alt="icon">
                    <h5>Customer Delight &amp; People-Centric Approach</h5>
                    <p>Our motto is to be as open a forum as we possibly can. Every student, every parent is always welcome to reach out and speak up. You are our priority.</p>
                </div>
            </div>
            </div>
        </div>
    </section>

    <section class="our-toppers">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <h3>Meet our <span class="text-orange">toppers</span></h3>
                    <p>Meet these shining stars who made it to the top and are proud to be called toppers of their exams.</p>
                </div>
            </div>
            <div class="row">
                <div class="col-md-9 mx-auto">
                    <div class=" MT-OwlDots toppersCarousel owl-carousel owl-theme">
                       
                        <div class="item">
                            <div class="toppers">
                                <div class="student-card">
                                    <div class="detail">
                                        <h4 class="text-orange">91%</h4>
                                        <p class="name">Laxmi</p>
                                        <p class="rank">Result 2023</p>
                                    </div>
                                    <img src="https://placehold.co/200x200.png" alt="topper">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="toppers">
                                <div class="student-card">
                                    <div class="detail">
                                        <h4 class="text-orange">98.4</h4>
                                        <p class="name">Aayush Jivrajani</p>
                                        <p class="rank">CBSE Result 2023</p>
                                    </div>
                                    <img src="https://placehold.co/200x200.png" alt="topper">
                                </div>
                            </div>
                        </div>
                        <div class="item">
                            <div class="toppers">
                                <div class="student-card">
                                    <div class="detail">
                                    <h4 class="text-orange">98.2</h4>
                                    <p class="name">Tatva Jani</p>
                                    <p class="rank">CBSE Result 2023</p>
                                    </div>
                                    <img src="https://placehold.co/200x200.png" alt="topper">
                                </div>
                            </div>
                        </div>
                       
                            
                    </div>
                </div>
            </div>
        </div>
    </section>      
@endsection
