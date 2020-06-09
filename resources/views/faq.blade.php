@extends('layouts.frontend_master')

@section('frontend_content')
  <!-- .breadcumb-area start -->
      <div class="breadcumb-area bg-img-4 ptb-100">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                      <div class="breadcumb-wrap text-center">
                          <h2>Frequently Asked Questions (FAQ)</h2>
                          <ul>
                              <li><a href="{{ url('home') }}">Home</a></li>
                              <li><span>FAQ</span></li>
                          </ul>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <!-- .breadcumb-area end -->
      <!-- about-area start -->
      <div class="about-area ptb-100">
          <div class="container">
              <div class="row">
                  <div class="col-12">
                    <div class="about-wrap text-center">
                      <h3>FAQ</h3>
                    </div>

                    @foreach ($faqs as $faq)
                    <div class="accordion" id="accordionExample">
                      {{-- <div class="card border-0">
                        <div class="card-header border-0 p-0 my-3">
                            <button class="btn btn-link text-left py-3 w-100 text-white" type="button" data-toggle="collapse" data-target="#faq1" aria-expanded="true" aria-controls="faq1">
                              Why Lorem ipsum dolor sit amet, consectetur adipisicing elit?
                            </button>
                        </div>

                        <div id="faq1" class="collapse show" aria-labelledby="faq1" data-parent="#accordionExample">
                          <div class="card-body">
                            Anim pariatur cliche reprehenderit, enim eiusmod high life accusamus terry richardson ad squid. 3 wolf moon officia aute, non cupidatat skateboard dolor brunch. Food truck quinoa nesciunt laborum eiusmod. Brunch 3 wolf moon tempor, sunt aliqua put a bird on it squid single-origin coffee nulla assumenda shoreditch et. Nihil anim keffiyeh helvetica, craft beer labore wes anderson cred nesciunt sapiente ea proident. Ad vegan excepteur butcher vice lomo. Leggings occaecat craft beer farm-to-table, raw denim aesthetic synth nesciunt you probably haven't heard of them accusamus labore sustainable VHS.
                          </div>
                        </div>
                      </div> --}}
                        <div class="card border-0">
                        <div class="card-header border-0 p-0 my-3">
                            <button class="btn btn-link text-left py-3 collapsed w-100 text-white" type="button" data-toggle="collapse" data-target="#{{ $faq->id }}" aria-expanded="false" aria-controls="faq3">
                              {{ $faq->add_ask }}
                            </button>
                        </div>
                        <div id="{{ $faq->id }}" class="collapse" aria-labelledby="faq3" data-parent="#accordionExample">
                          <div class="card-body">
                            {{ $faq->add_ans }}
                          </div>
                        </div>
                      </div>
                    </div>
                  @endforeach
                  </div>
              </div>
          </div>
      </div>
      <!-- about-area end -->
@endsection
