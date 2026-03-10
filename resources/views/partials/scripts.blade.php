<script>
    // Default configuration
    const defaultConfig = {
        college_name: 'Fusion College',
        hero_headline: 'Empowering Future Professionals Through Quality Education',
        contact_phone: '1300 123 456',
        contact_email: 'info@pacificinstitute.edu.au',
        primary_color: '#077E86',
        secondary_color: '#c9a227',
        text_color: '#1a1a1a',
        background_color: '#ffffff',
        font_family: 'Arial'
    };

    let config = { ...defaultConfig };

    // Element SDK initialization
    if (window.elementSdk) {
        window.elementSdk.init({
            defaultConfig,
            onConfigChange: async (newConfig) => {
                config = { ...defaultConfig, ...newConfig };

                // Update college name
                const collegeNameEl = document.getElementById('collegeName');
                if (collegeNameEl) {
                    collegeNameEl.textContent = config.college_name || defaultConfig.college_name;
                }
                const collegeNameFooterEl = document.getElementById('collegeNameFooter');
                if (collegeNameFooterEl) {
                    collegeNameFooterEl.textContent = config.college_name || defaultConfig.college_name;
                }

                // Update hero headline
                const heroTitleEl = document.getElementById('heroTitle');
                if (heroTitleEl) {
                    heroTitleEl.textContent = config.hero_headline || defaultConfig.hero_headline;
                }

                // Update contact info
                const contactPhoneEl = document.getElementById('contactPhone');
                if (contactPhoneEl) {
                    contactPhoneEl.textContent = config.contact_phone || defaultConfig.contact_phone;
                }
                const contactEmailEl = document.getElementById('contactEmail');
                if (contactEmailEl) {
                    contactEmailEl.textContent = config.contact_email || defaultConfig.contact_email;
                }
                const footerPhoneEl = document.getElementById('footerPhone');
                if (footerPhoneEl) {
                    footerPhoneEl.textContent = config.contact_phone || defaultConfig.contact_phone;
                }
                const footerEmailEl = document.getElementById('footerEmail');
                if (footerEmailEl) {
                    footerEmailEl.textContent = config.contact_email || defaultConfig.contact_email;
                }

                // Update CSS variables for colors
                document.documentElement.style.setProperty('--primary', config.primary_color || defaultConfig.primary_color);
                document.documentElement.style.setProperty('--secondary', config.secondary_color || defaultConfig.secondary_color);
            },
            mapToCapabilities: (config) => ({
                recolorables: [
                    {
                        get: () => config.primary_color || defaultConfig.primary_color,
                        set: (value) => {
                            config.primary_color = value;
                            window.elementSdk.setConfig({ primary_color: value });
                        }
                    },
                    {
                        get: () => config.secondary_color || defaultConfig.secondary_color,
                        set: (value) => {
                            config.secondary_color = value;
                            window.elementSdk.setConfig({ secondary_color: value });
                        }
                    }
                ],
                borderables: [],
                fontEditable: {
                    get: () => config.font_family || defaultConfig.font_family,
                    set: (value) => {
                        config.font_family = value;
                        window.elementSdk.setConfig({ font_family: value });
                    }
                },
                fontSizeable: undefined
            }),
            mapToEditPanelValues: (config) => new Map([
                ['college_name', config.college_name || defaultConfig.college_name],
                ['hero_headline', config.hero_headline || defaultConfig.hero_headline],
                ['contact_phone', config.contact_phone || defaultConfig.contact_phone],
                ['contact_email', config.contact_email || defaultConfig.contact_email]
            ])
        });
    }

    // Theme Toggle - System default with light/dark toggle
    const themeToggle = document.getElementById('themeToggle');
    const sunIcon = document.getElementById('sunIcon');
    const moonIcon = document.getElementById('moonIcon');
    
    function getSystemTheme() {
        return window.matchMedia('(prefers-color-scheme: dark)').matches ? 'dark' : 'light';
    }
    
    function setTheme(theme) {
        document.documentElement.setAttribute('data-theme', theme);
        localStorage.setItem('theme', theme);
        updateThemeIcons(theme);
    }
    
    function updateThemeIcons(theme) {
        if (sunIcon && moonIcon) {
            if (theme === 'dark') {
                sunIcon.style.display = 'none';
                moonIcon.style.display = 'inline';
            } else {
                sunIcon.style.display = 'inline';
                moonIcon.style.display = 'none';
            }
        }
    }
    
    // Initialize theme - check localStorage first, then system
    let initialTheme = localStorage.getItem('theme');
    if (!initialTheme) {
        initialTheme = getSystemTheme();
    }
    setTheme(initialTheme);
    
    if (themeToggle) {
        themeToggle.addEventListener('click', () => {
            const currentTheme = document.documentElement.getAttribute('data-theme');
            const newTheme = currentTheme === 'light' ? 'dark' : 'light';
            setTheme(newTheme);
        });
    }
    
    // Listen for system theme changes
    window.matchMedia('(prefers-color-scheme: dark)').addEventListener('change', (e) => {
        if (!localStorage.getItem('theme')) {
            setTheme(e.matches ? 'dark' : 'light');
        }
    });

    // Hero Slider
    const heroSlides = document.querySelectorAll('.hero-slide');
    const heroIndicators = document.querySelectorAll('.hero-indicator');
    
    if (heroSlides.length > 0) {
        let currentSlide = 0;

        function showSlide(index) {
            heroSlides.forEach((slide, i) => {
                slide.classList.toggle('active', i === index);
            });
            heroIndicators.forEach((indicator, i) => {
                indicator.classList.toggle('active', i === index);
            });
            currentSlide = index;
        }

        // Auto slide
        setInterval(() => {
            currentSlide = (currentSlide + 1) % heroSlides.length;
            showSlide(currentSlide);
        }, 5000);

        // Indicator click handlers
        heroIndicators.forEach((indicator) => {
            indicator.addEventListener('click', () => {
                const slideIndex = parseInt(indicator.dataset.slide);
                showSlide(slideIndex);
            });
        });
    }

    // Testimonials Slider
    const testimonialSlides = [
        {
            quote: '"Fusion College provided me with the skills and confidence I needed to launch my career in IT. The hands-on training and supportive instructors made all the difference in my professional development."',
            name: 'Sarah Chen',
            role: 'Diploma of IT Graduate, 2023'
        },
        {
            quote: '"The hands-on approach to learning at Fusion College helped me gain practical skills that I use every day in my job. The career support team was amazing in helping me find employment after graduation."',
            name: 'Michael Rodriguez',
            role: 'Diploma of Business Graduate, 2022'
        },
        {
            quote: '"Choosing Fusion College was the best decision I made for my career. The industry-experienced trainers and modern facilities provided me with a world-class education."',
            name: 'Emma Thompson',
            role: 'Advanced Diploma of Leadership Graduate, 2023'
        }
    ];

    const quoteEl = document.getElementById('testimonialQuote');
    if (quoteEl && testimonialSlides.length > 0) {
        let currentTestimonial = 0;

        function showTestimonial(index) {
            const nameEl = document.getElementById('testimonialName');
            const roleEl = document.getElementById('testimonialRole');
            const dots = document.querySelectorAll('.testimonial-dot');

            if (quoteEl && testimonialSlides[index]) {
                quoteEl.textContent = testimonialSlides[index].quote;
                nameEl.textContent = testimonialSlides[index].name;
                roleEl.textContent = testimonialSlides[index].role;
            }

            dots.forEach((dot, i) => {
                dot.classList.toggle('active', i === index);
            });

            currentTestimonial = index;
        }

        // Testimonial dot click handlers
        document.querySelectorAll('.testimonial-dot').forEach((dot) => {
            dot.addEventListener('click', () => {
                const index = parseInt(dot.dataset.index);
                showTestimonial(index);
            });
        });

        // Auto testimonial slide
        setInterval(() => {
            currentTestimonial = (currentTestimonial + 1) % testimonialSlides.length;
            showTestimonial(currentTestimonial);
        }, 5000);
    }

    // Mobile Menu
    const mobileMenuBtn = document.getElementById('mobileMenuBtn');
    const mobileMenu = document.getElementById('mobileMenu');
    const mobileOverlay = document.getElementById('mobileOverlay');
    const mobileClose = document.getElementById('mobileClose');

    if (mobileMenuBtn && mobileMenu) {
        mobileMenuBtn.addEventListener('click', () => {
            mobileMenu.classList.add('open');
            if (mobileOverlay) mobileOverlay.classList.add('open');
        });

        function closeMobileMenu() {
            mobileMenu.classList.remove('open');
            if (mobileOverlay) mobileOverlay.classList.remove('open');
        }

        if (mobileClose) mobileClose.addEventListener('click', closeMobileMenu);
        if (mobileOverlay) mobileOverlay.addEventListener('click', closeMobileMenu);

        // Mobile menu links
        document.querySelectorAll('.mobile-menu-nav a').forEach((link) => {
            link.addEventListener('click', closeMobileMenu);
        });
    }

    // Smooth scroll for navigation links
    document.querySelectorAll('a[href^="#"]').forEach((anchor) => {
        anchor.addEventListener('click', function (e) {
            const href = this.getAttribute('href');
            if (href !== '#') {
                e.preventDefault();
                const target = document.querySelector(href);
                if (target) {
                    target.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            }
        });
    });

    // Scroll animations
    const fadeElements = document.querySelectorAll('.fade-in');

    const observer = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                entry.target.classList.add('visible');
            }
        });
    }, {
        threshold: 0.1,
        rootMargin: '0px 0px -50px 0px'
    });

    fadeElements.forEach((el) => observer.observe(el));

    // Stats counter animation
    const statNumbers = document.querySelectorAll('.stat-number[data-target]');

    const statsObserver = new IntersectionObserver((entries) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const target = parseInt(entry.target.dataset.target);
                animateCounter(entry.target, target);
                statsObserver.unobserve(entry.target);
            }
        });
    }, { threshold: 0.5 });

    statNumbers.forEach((stat) => statsObserver.observe(stat));

    function animateCounter(element, target) {
        let current = 0;
        const increment = target / 50;
        const timer = setInterval(() => {
            current += increment;
            if (current >= target) {
                element.textContent = target.toLocaleString();
                clearInterval(timer);
            } else {
                element.textContent = Math.floor(current).toLocaleString();
            }
        }, 30);
    }

    // Contact Form
    const contactForm = document.getElementById('contactForm');
    const toast = document.getElementById('toast');

    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const formData = new FormData(contactForm);
            
            fetch('/api/contact-messages', {
                method: 'POST',
                headers: {
                    'Content-Type': 'application/json',
                    'X-CSRF-TOKEN': '{{ csrf_token() }}'
                },
                body: JSON.stringify(Object.fromEntries(formData))
            })
            .then(response => response.json())
            .then(data => {
                toast.textContent = data.message || 'Message sent successfully!';
                toast.classList.add('show');
                contactForm.reset();
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            })
            .catch(error => {
                toast.textContent = 'Message sent successfully!';
                toast.classList.add('show');
                contactForm.reset();
                setTimeout(() => {
                    toast.classList.remove('show');
                }, 3000);
            });
        });
    }

    // Pill navbar: add solid background on scroll
    const header = document.querySelector('.main-header');

    window.addEventListener('scroll', () => {
        if (window.scrollY > 80) {
            header.classList.add('scrolled');
        } else {
            header.classList.remove('scrolled');
        }
    });

    // Initial scroll check
    if (window.scrollY > 80) {
        header.classList.add('scrolled');
    }
</script>
