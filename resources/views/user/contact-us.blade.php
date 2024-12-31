@extends('user.layouts.master')

@section('content')
<div class="contact-wrapper pt--150">
    <div class="container">
        <div class="contact-container">
            <!-- Contact Form Section -->
            <div class="contact-form-section">
                <h2 class="section-title">Get in touch</h2>
                
                <form class="contact-form" action="{{route('send_mail')}}" id="contact-form">
                    @csrf
                    <div class="form-group">
                        <input type="text" id="contact_name" name="contact_name" class="form-input" placeholder="Your name*" value="{{Auth::user()->name ?? ''}}">
                        <div class="error-message"></div>
                    </div>
                
                    <div class="form-group">
                        <input type="email" id="contact_email" name="contact_email" class="form-input" placeholder="Email Address*" value="{{Auth::user()->email ?? ''}}">
                        <div class="error-message"></div>
                    </div>
                
                    <div class="form-group">
                        <input type="text" id="contact_phone" name="contact_phone" class="form-input" placeholder="Your Phone*" value="{{Auth::user()->phone_number ?? ''}}">
                        <div class="error-message"></div>
                    </div>
                
                    <div class="form-group">
                        <textarea class="form-input form-textarea" id="contact_message" name="contact_message" placeholder="Message*"></textarea>
                        <div class="error-message"></div>
                    </div>
                
                    <button type="submit" class="submit-button">Send Message</button>
                </form>                
            </div>

            <!-- Contact Info Section -->
            <div class="contact-info-section">
                <h2 class="section-title">Contact info</h2>

                <div class="info-card">
                    <h3>Postal Address</h3>
                    <p>PO Box 16122 Collins Street West<br>Victoria 8007 Australia</p>
                </div>

                <div class="info-card">
                    <h3>Airi HQ</h3>
                    <p>Postal Address<br>PO Box 16122 Collins Street West<br>Victoria 8007 Australia</p>
                </div>

                <div class="contact-grid">
                    <div class="info-card">
                        <h3>Business Phone</h3>
                        <a href="tel:+962786907594" class="contact-link">+9627 8690 7594</a>
                    </div>
                    
                    <div class="info-card">
                        <h3>Say Hello</h3>
                        <a href="mailto:naseralzaghari88@gmail.com" class="contact-link">naseralzaghari88@gmail.com</a>
                    </div>
                </div>

                <div class="social-links">
                    <a href="https://twitter.com" class="social-icon"><i class="fa fa-twitter"></i></a>
                    <a href="https://facebook.com" class="social-icon"><i class="fa fa-facebook"></i></a>
                    <a href="https://instagram.com" class="social-icon"><i class="fa fa-instagram"></i></a>
                    <a href="https://youtube.com" class="social-icon"><i class="fa fa-youtube"></i></a>
                    <a href="https://plus.google.com" class="social-icon"><i class="fa fa-google-plus"></i></a>
                </div>
            </div>
        </div>
    </div>
</div>




<style>
.contact-wrapper {
    padding: 100px 0;
    background-color: #fff;
}

.contact-container {
    display: grid;
    grid-template-columns: 1.5fr 1fr;
    gap: 60px;
    max-width: 1200px;
    margin: 0 auto;
}

.section-title {
    font-size: 32px;
    font-weight: 600;
    margin-bottom: 40px;
    color: #333;
}

/* Form Styles */
.contact-form {
    width: 100%;
}

.error-message {
    color: red;
}
.form-group {
    position: relative;
    margin-bottom: 25px;
}

.form-input {
    width: 100%;
    padding: 12px 0;
    font-size: 16px;
    border: none;
    border-bottom: 2px solid #ddd;
    background: transparent;
    transition: all 0.3s ease;
}

.form-textarea {
    min-height: 120px;
    resize: vertical;
}

.form-input:focus {
    outline: none;
    border-bottom-color: #007bff;
}



.form-input:focus ~ .focus-border {
    width: 100%;
}

.submit-button {
    padding: 15px 40px;
    font-size: 16px;
    color: #fff;
    background-color: #007bff;
    border: none;
    border-radius: 30px;
    cursor: pointer;
    transition: all 0.3s ease;
}

.submit-button:hover {
    background-color: #0056b3;
    transform: translateY(-2px);
    box-shadow: 0 5px 15px rgba(0,0,0,0.1);
}

/* Info Card Styles */
.info-card {
    margin-bottom: 35px;
}

.info-card h3 {
    font-size: 20px;
    font-weight: 600;
    margin-bottom: 15px;
    color: #333;
}

.info-card p {
    color: #666;
    line-height: 1.6;
}

.contact-link {
    color: #007bff;
    text-decoration: none;
    transition: color 0.3s ease;
}

.contact-link:hover {
    color: #0056b3;
}

.contact-grid {
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    gap: 30px;
    margin-bottom: 35px;
}

/* Social Links */
.social-links {
    display: flex;
    gap: 15px;
}

.social-icon {
    display: flex;
    align-items: center;
    justify-content: center;
    width: 40px;
    height: 40px;
    border-radius: 50%;
    background-color: #f5f5f5;
    color: #333;
    text-decoration: none;
    transition: all 0.3s ease;
}

.social-icon:hover {
    background-color: #007bff;
    color: #fff;
    transform: translateY(-2px);
}

/* Responsive Design */
@media (max-width: 992px) {
    .contact-wrapper {
        padding: 60px 0;
    }
    
    .contact-container {
        grid-template-columns: 1fr;
        gap: 40px;
        padding: 0 20px;
    }
}

@media (max-width: 576px) {
    .section-title {
        font-size: 28px;
        margin-bottom: 30px;
    }
    
    .contact-grid {
        grid-template-columns: 1fr;
        gap: 20px;
    }
    
    .submit-button {
        width: 100%;
    }
}
</style>
@endsection