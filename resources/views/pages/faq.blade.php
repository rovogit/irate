@extends('layouts.app', ['h' => 'header2'])

@section('title', __('FAQ'))
@section('description', __('FAQ'))

@section('content')
    <!-- Breadcrumb Area-->
    <div class="breadcrumb--area bg-img bg-overlay--gray jarallax" style="background-image: url('/img/custom-img/faq.jpg');">
        <div class="container h-100">
            <div class="row h-100 align-items-center">
                <div class="col-12">
                    <div class="breadcrumb-content">
                        <h2 class="breadcrumb-title">{{ __('FAQ') }}</h2>
                        <nav aria-label="breadcrumb">
                            <ol class="breadcrumb justify-content-center">
                                <li class="breadcrumb-item"><a href="/">{{ __('Home') }}</a></li>
                                <li class="breadcrumb-item"><a href="#">{{ __('FAQ') }}</a></li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- FAQ Area-->
    <div class="faq--area section-padding-120">
        <div class="container">
            <div class="row g-5">
                <div class="col-12 col-lg-6">
                    <div class="faq-content">
                        <div class="accordion faq--accordian" id="faqaccordian">
                            <!-- Single FAQ-->
                            <div class="card border-0">
                                <div class="card-header" id="headingOne">
                                    <button class="btn" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">1. {{ __('Personal information:') }}</button>
                                </div>
                                <div class="collapse show" id="collapseOne" aria-labelledby="headingOne" data-parent="#faqaccordian">
                                    <div class="card-body">
                                        <p>{{ __('How to register on iRate?') }}</p>
                                        <p>{{ __('What information will be available to me after registration?') }}</p>
                                        <p>{{ __('How to restore access to a personal account?') }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FAQ-->
                            <div class="card border-0">
                                <div class="card-header" id="headingTwo">
                                    <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">2. {{ __('Personal stats:') }}</button>
                                </div>
                                <div class="collapse" id="collapseTwo" aria-labelledby="headingTwo" data-parent="#faqaccordian">
                                    <div class="card-body">
                                        <p>{{ __('What does iRate do for effective promotion?') }}</p>
                                        <p>{{ __('How to view statistics for a certain period?') }}</p>
                                        <p>{{ __('Why is the activity decreasing?') }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FAQ-->
                            <div class="card border-0">
                                <div class="card-header" id="headingThree">
                                    <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="true" aria-controls="collapseThree">3. {{ __('Reviews') }}:</button>
                                </div>
                                <div class="collapse" id="collapseThree" aria-labelledby="headingThree" data-parent="#faqaccordian">
                                    <div class="card-body">
                                        <p>{{ __('How to delete a review on iRate?') }}</p>
                                        <p>{{ __('Why arent new reviews about the company appearing?') }}</p>
                                        <p>{{ __('What can you do to make your company more popular?') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-12 col-lg-6">
                    <div class="faq-content">
                        <div class="accordion faq--accordian" id="faqaccordian2">
                            <!-- Single FAQ-->
                            <div class="card border-0">
                                <div class="card-header" id="headingFour">
                                    <button class="btn" type="button" data-toggle="collapse" data-target="#collapseFour" aria-expanded="true" aria-controls="collapseFour">4. {{ __('Website for private professionals:') }}</button>
                                </div>
                                <div class="collapse show" id="collapseFour" aria-labelledby="headingFour" data-parent="#faqaccordian2">
                                    <div class="card-body">
                                        <p>{{ __('Why is my profile already posted on iRate?') }}</p>
                                        <p>{{ __('I am a private specialist and I want to renew access. How to do it?') }}</p>
                                        <p>{{ __('I want to make changes to the questionnaire, is it possible?') }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FAQ-->
                            <div class="card border-0">
                                <div class="card-header" id="headingFive">
                                    <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseFive" aria-expanded="true" aria-controls="collapseFive">5. {{ __('Content:') }}</button>
                                </div>
                                <div class="collapse" id="collapseFive" aria-labelledby="headingFive" data-parent="#faqaccordian2">
                                    <div class="card-body">
                                        <p>{{ __('Do I need to run stocks?') }}</p>
                                        <p>{{ __('Stock statistics for competing companies?') }}</p>
                                        <p>{{ __('How to add a stocks yourself?') }}</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Single FAQ-->
                            <div class="card border-0">
                                <div class="card-header" id="headingSix">
                                    <button class="btn collapsed" type="button" data-toggle="collapse" data-target="#collapseSix" aria-expanded="true" aria-controls="collapseSix">6. {{ __('Cooperation:') }}</button>
                                </div>
                                <div class="collapse" id="collapseSix" aria-labelledby="headingSix" data-parent="#faqaccordian2">
                                    <div class="card-body">
                                        <p>{{ __('What to buy for effective promotion?') }}</p>
                                        <p>{{ __('Is it possible to split the payment?') }}</p>
                                        <p>{{ __('Cost of promotion on iRate') }}</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="border-top"></div>
    </div>

    <!-- Cool Facts Area-->
    <section class="cta-area cta3 py-5">
        <div class="container">
            <div class="row align-items-center justify-content-between">
                <div class="col-12 col-sm-8">
                    <div class="cta-text mb-4 mb-sm-0">
                        <h3 class="text-white mb-0">{{ __('Interesting product') }}</h3>
                    </div>
                </div>
                <div class="col-12 col-sm-4 text-sm-right"><a class="btn saasbox-btn white-btn" href="#">{{ __('Go') }}</a>
                </div>
            </div>
        </div>
    </section>
@endsection
