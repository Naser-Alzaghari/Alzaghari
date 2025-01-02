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
                
                    <button type="submit" class="btn btn-style-1 submit-button">Send Message</button>
                </form>
                <div class="form-status-messages">
                    <div class="success-message text-success" style="display: none;">
                        Message sent successfully! We'll get back to you soon.
                    </div>
                    <div class="error-message-global text-danger" style="display: none;">
                            Oops! Something went wrong and we couldn't send your message.
                    </div>
                </div>
            </div>

            <!-- Contact Info Section -->
            <div class="contact-info-section">
                <h2 class="section-title">Contact info</h2>

                <div class="info-card">
                    <h3>Address</h3>
                    <p>Jordan - Amman</p>
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
                    <a href="https://facebook.com" class="social-icon"><i class="fa fa-facebook"></i></a>
                    <a href="https://instagram.com" class="social-icon"><i class="fa fa-instagram"></i></a>
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
    border-bottom-color: #2D2FC9;
}



.form-input:focus ~ .focus-border {
    width: 100%;
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
    color: #2D2FC9;
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
    background-color: #2D2FC9;
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

.form-status-messages {
    margin-top: 20px;
}

.alert {
    padding: 15px;
    border-radius: 4px;
    margin-bottom: 15px;
    display: none;
}

.alert-success {
    background-color: #d4edda;
    border-color: #c3e6cb;
    color: #155724;
}

.alert-danger {
    background-color: #f8d7da;
    border-color: #f5c6cb;
    color: #721c24;
}

.submit-button {
    position: relative;
    display: inline-flex;
    align-items: center;
    justify-content: center;
    min-width: 180px;
}



.spinner {
    display: none;
    width: 20px;
    height: 20px;
    margin-left: 10px;
    border: 3px solid #ffffff;
    border-top: 3px solid transparent;
    border-radius: 50%;
    animation: spin 1s linear infinite;
}

@keyframes spin {
    0% { transform: rotate(0deg); }
    100% { transform: rotate(360deg); }
}
</style>
@endsection