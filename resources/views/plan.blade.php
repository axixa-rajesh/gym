 @extends('layouts.app')
@section('bread')
    <!-- Hero Section Begin -->
    <section class="hero-section">
        <div class="hs-slider owl-carousel">
            <div class="hs-item set-bg" data-setbg="img/hero/hero-1.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Shape your body</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>
                                {{-- <a href="#" class="primary-btn">Get info</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="hs-item set-bg" data-setbg="img/hero/hero-2.jpg">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 offset-lg-6">
                            <div class="hi-text">
                                <span>Shape your body</span>
                                <h1>Be <strong>strong</strong> traning hard</h1>
                                {{-- <a href="#" class="primary-btn">Get info</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Hero Section End -->
@endsection
@section('content')
   
         
 <section class="pricing-section service-pricing spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="section-title">
                        <span>Our Plan</span>
                        <h2>Choose your pricing plan</h2>
                    </div>
                </div>
            </div>
            <div class="row justify-content-center">
                @foreach ($data as $info)

                <div class="col-lg-4 col-md-8">
                    <div class="ps-item">
                        <h3>{{$info['name']}}</h3>
                        <div class="pi-price">
                        <span>Months: {{$info['duration']}}</span>
                        </div>
                        <div class="pi-price">
                            <h2 style="font-size: 2em">
                                @if($info['discount'])
                                    <div>
                                    <del>{{$info['fees']}}</del> &#8377; 
                                    </div>
                                    <div >

                                        <span style="font-size:0.6em !important;">({{$info['discount']}}%)</span>
                                    </div>
                                    <div>
                                      <ins>
                                        {{$info['fees']-($info['fees']*$info['discount']/100)}} &#8377; 
                                      </ins>
                                      </div>
                                @else
                                    {{$info['fees']}} &#8377; 
                                @endif
                            </h2>
                        </div>
                        <div class="pi-price">
                             <span>
                               
                            {{$info['description']}}
                              
                             </span>
                        </div>
                        
                    </div>
                </div>
               
       @endforeach
            </div>
        </div>
    </section>
 
@endsection
