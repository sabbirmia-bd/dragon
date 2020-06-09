@extends('layouts.frontend_master')

@section('frontend_content')
  <!-- .breadcumb-area start -->
   <div class="breadcumb-area bg-img-4 ptb-100">
       <div class="container">
           <div class="row">
               <div class="col-12">
                   <div class="breadcumb-wrap text-center">
                       <h2>Contact Us</h2>
                       <ul>
                           <li><a href="{{ url('/')}}">Home</a></li>
                           <li><span>Contact</span></li>
                       </ul>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- .breadcumb-area end -->
   <!-- contact-area start -->
   <div class="google-map">
       <div class="contact-map">
           <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d193595.9147703055!2d-74.11976314309273!3d40.69740344223377!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c24fa5d33f083b%3A0xc80b8f06e177fe62!2sNew+York%2C+NY%2C+USA!5e0!3m2!1sen!2sbd!4v1547528325671" allowfullscreen></iframe>
       </div>
   </div>
   <div class="contact-area ptb-100">
       <div class="container">
           <div class="row">
               <div class="col-lg-8 col-12">
                 @if (session('message_status'))
                   <div class="alert alert-success">
                     {{ session('message_status') }}
                   </div>
                 @endif
                   <div class="contact-form form-style">
                       <div class="cf-msg"></div>
                       <form action="{{ url('contact/post') }}" method="post" id="cf">
                         @csrf
                           <div class="row">
                               <div class="col-12 col-sm-6">
                                   <input type="text" placeholder="Name" id="fname" name="name">
                                   @error ('name')
                                     <span class="text-danger">
                                       {{ $message }}
                                     </span>
                                   @enderror
                               </div>
                               <div class="col-12  col-sm-6">
                                   <input type="text" placeholder="Email" id="email" name="email">
                                   @error ('email')
                                     <span class="text-danger">
                                       {{ $message }}
                                     </span>
                                   @enderror
                               </div>
                               <div class="col-12">
                                   <input type="text" placeholder="Subject" id="subject" name="subject">

                               </div>
                               <div class="col-12">
                                   <textarea class="contact-textarea" placeholder="Message" id="msg" name="message"></textarea>
                                   @error ('message')
                                     <span class="text-danger">
                                       {{ $message }}
                                     </span>
                                   @enderror
                               </div>
                               <div class="col-12">
                                   <button type="submit" name="submit">SEND MESSAGE</button>
                               </div>
                           </div>
                       </form>
                   </div>
               </div>
               <div class="col-lg-4 col-12">
                   <div class="contact-wrap">
                       <ul>
                         @foreach ($contactinfos as $contactinfo)
                            <li>
                                <i class="fa fa-home"></i> Address:
                                <p>{{ $contactinfo->address }}</p>
                            </li>
                            <li>
                                <i class="fa fa-envelope"></i> Email address:
                                <p>
                                    <span>{{ $contactinfo->email_address }} </span>

                                </p>
                            </li>
                            <li>
                                <i class="fa fa-phone"></i> phone number:
                                <p>
                                    <span>{{ $contactinfo->phone_number }}</span>

                                </p>
                            </li>
                            @endforeach
                        </ul>
                   </div>
               </div>
           </div>
       </div>
   </div>
   <!-- contact-area end -->
@endsection
