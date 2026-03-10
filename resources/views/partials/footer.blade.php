<!-- Footer -->
<footer class="footer">
    <div class="container">
        <div class="footer-grid">
            <div class="footer-brand">
                <a href="{{ route('home') }}" class="logo">
                    <div class="logo-icon">
                        <svg width="30" height="30" viewBox="0 0 30 30" fill="none">
                            <path d="M15 2L3 9v12l12 7 12-7V9L15 2z" fill="#077E86" fill-opacity="0.3" />
                            <path d="M15 5L6 10v10l9 5 9-5V10l-9-5z" fill="#077E86" />
                            <circle cx="15" cy="15" r="4" fill="#c9a227" />
                        </svg>
                    </div>
                    <div>
                        <div class="logo-text" id="collegeNameFooter">Fusion College</div>
                        <div class="logo-tagline">of Technology</div>
                    </div>
                </a>
                <p>Fusion College of Technology is a leading registered training organisation dedicated to providing quality vocational education and training to domestic and international students.</p>
                <div class="footer-social">
                    <a href="#">📘</a>
                    <a href="#">🐦</a>
                    <a href="#">📷</a>
                    <a href="#">💼</a>
                    <a href="#">▶️</a>
                </div>
            </div>

            <div class="footer-column">
                <h4>Quick Links</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('home') }}#about">About Us</a></li>
                    <li><a href="{{ route('courses') }}">Our Courses</a></li>
                    <li><a href="{{ route('admissions') }}">Admissions</a></li>
                    <li><a href="{{ route('events') }}">Events</a></li>
                    <li><a href="{{ route('contact') }}">Contact Us</a></li>
                    <li><a href="#">Student Portal</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Programs</h4>
                <ul class="footer-links">
                    <li><a href="{{ route('courses') }}">Information Technology</a></li>
                    <li><a href="{{ route('courses') }}">Business & Management</a></li>
                    <li><a href="{{ route('courses') }}">Early Childhood Education</a></li>
                    <li><a href="{{ route('courses') }}">English Programs</a></li>
                    <li><a href="{{ route('courses') }}">Leadership</a></li>
                    <li><a href="{{ route('courses') }}">Cybersecurity</a></li>
                </ul>
            </div>

            <div class="footer-column">
                <h4>Contact Info</h4>
                <ul class="footer-links">
                    <li>📍 Level 5, 123 George Street, Sydney NSW 2000</li>
                    <li>📞 <span id="footerPhone">1300 123 456</span></li>
                    <li>✉️ <span id="footerEmail">info@pacificinstitute.edu.au</span></li>
                    <li>🕐 Mon-Fri: 9AM-5PM</li>
                </ul>
            </div>
        </div>

        <div class="footer-bottom">
            <p class="footer-copyright">© 2024 Fusion College of Technology. All rights reserved. RTO: 45123 | CRICOS: 03456J</p>
            <div class="footer-policies">
                <a href="#">Privacy Policy</a>
                <a href="#">Terms of Service</a>
                <a href="#">Refund Policy</a>
                <a href="#">Student Handbook</a>
            </div>
        </div>
    </div>
</footer>
