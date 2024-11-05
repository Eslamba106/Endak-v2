        <!-- Start::footer -->
        <footer class="footer bg-primary mt-auto text-white position-relative">
            {{-- <img src="{{ asset('assets/images/patterns/9.png') }}" alt="img" class="patterns-9 z-index-0">
            <img src="{{ asset('assets/images/patterns/6.png') }}" alt="img" class="patterns-4 z-index-0">
            <img src="{{ asset('assets/images/patterns/11.png') }}" alt="img" class="patterns-3 z-index-0"> --}}
            <div class="py-5">
                <?php $settings = App\Models\Settings::first(); ?>

                <div class="container">
                    <div class="row">
                        <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                            <a href="#" class="d-inline-block mb-3"><img
                                    src="{{ $settings->image_url ?? '' }}" width="150px" height="50px" alt="img"></a>
                            {{-- <p class="mb-4 op-8 fw-light">
                                At dolor clita amet erat takimata sed tempor invidunt lorem.
                                Justo sea nonumy.
                            </p> --}}
                            <ul class="list-unstyled mb-0">
                                <li class="list-item mb-2"><a href="#" class="footer-link"><i
                                            class="bi bi-telephone me-3 tx-18"></i>{{ $settings->phone ?? '' }}</a></li>
                                <li class="list-item mb-2"><a href="#" class="footer-link"><i
                                            class="bi bi-envelope-plus me-3 tx-18"></i>{{ $settings->email ?? '' }}</a></li>
                                <li class="list-item"><a href="#" class="footer-link"><i
                                            class="bi bi-geo-alt me-3 tx-18"></i>{{ $settings->address ?? '' }} </a></li>
                            </ul>
                            <div class="footer-btn-list d-flex align-items-center mt-4">
                                <a href="{{ $settings->facebook ?? '' }}"
                                    class="footer-btn btn btn-icon btn-info-dark rounded-circle me-2"><i
                                        class="bi bi-facebook"></i></a>
                                <a href="{{ $settings->linkedin ?? '' }}"
                                    class="footer-btn btn btn-icon btn-info-dark rounded-circle me-2"><i
                                        class="bi bi-linkedin"></i></a>
                                <a href="{{ $settings->instagram ?? '' }}"
                                    class="footer-btn btn btn-icon btn-info-dark rounded-circle me-2"><i
                                        class="bi bi-instagram"></i></a>
                                <a href="{{ $settings->twitter ?? '' }}"
                                    class="footer-btn btn btn-icon btn-info-dark rounded-circle"><i
                                        class="bi bi-twitter"></i></a>
                            </div>
                        </div>
                        {{-- <div class="col-lg-3 col-md-6 mb-4 mb-lg-0">
                            <h4 class="text-white">Domains</h4>
                            <ul class="list-unstyled footer-icon">
                                <li class="list-item mb-2"><a href="" class="footer-link">Register
                                        Domain Name</a></li>
                                <li class="list-item mb-2"><a href="" class="footer-link">View
                                        Domain Pricing</a></li>
                                <li class="list-item mb-2"><a href="premium-domains.html" class="footer-link">Premium
                                        Domains</a></li>
                                <li class="list-item mb-2"><a href="domain-transfer.html" class="footer-link">Transfer
                                        Your Domain</a></li>
                                <li class="list-item mb-2"><a href="domain-transfer.html" class="footer-link">Bulk
                                        Domain Transfer</a></li>
                                <li class="list-item mb-2"><a href="free-with-domain.html" class="footer-link">Free With
                                        Every Domain</a></li>
                                <li class="list-item mb-2"><a href="name-suggestion-tool.html" class="footer-link">Name
                                        Suggestion</a></li>
                                <li class="list-item mb-2"><a href="whois-lookup.html" class="footer-link">Whois
                                        Lookup</a></li>
                                <li class="list-item"><a href="premium-domains.html" class="footer-link">View Promos</a>
                                </li>
                            </ul>
                        </div> --}}

                    </div>

                </div>
            </div>

            <div class="py-3 border-top border-white-2 text-center">
                <div class="container">
                    <span class="tx-14 op-8">
                        Copyright &#169;
                        <span id="year"></span>
                        -<?php $mytime = Carbon\Carbon::now();
                        echo $mytime->format('Y'); ?> </strong>
                        <a href="" class="text-white">Endak</a>
                        Designed with
                        <span class="fa fa-heart tx-danger"></span>
                        by
                        <a href="{{ config('app.developer_name') }}"
                            class="text-white">{{ config('app.developer_name') }}</a>
                        All Rights Reserved
                    </span>
                </div>
            </div>
        </footer>
        <!-- End::footer -->


        </div>
