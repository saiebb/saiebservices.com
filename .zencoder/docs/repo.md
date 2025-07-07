# SAIEB Services Website Information

## Summary
A bilingual (Arabic/English) PHP-based website for SAIEB Services, offering business services, individual services, financial consulting, and training programs. The site includes a public frontend and an administrative backend for content management.

## Structure
- **Root Directory**: Main website frontend files (PHP, CSS, JS)
- **saiebadmin25/**: Administrative backend system
- **action/**: API endpoints and database operations for frontend
- **config/**: Database configuration files
- **css/**: Stylesheets and icon libraries
- **js/**: JavaScript files and libraries
- **images/**: Media assets for the website

## Language & Runtime
**Language**: PHP
**Version**: Compatible with PHP 7.x and 8.x
**Database**: MySQL/MariaDB
**Server**: Apache with mod_rewrite, mod_headers, mod_expires

## Dependencies
**Frontend Libraries**:
- jQuery (js/plugins.min.js)
- Font Awesome (css/icons/font-awesome/)
- Bootstrap Icons (css/icons/bootstrap-icons/)
- Unicons (css/icons/unicons/)
- Swiper (css/swiper.css)

**Admin Dashboard Libraries**:
- Bootstrap 4
- DataTables
- Chart.js
- Summernote editor
- jQuery Validation
- FontAwesome
- Select2

## Configuration
**Database Setup**:
- Configuration file: `config/database.php`
- Auto-switching between development and production environments
- Local development settings: localhost, port auto-detection (3306, 3307, 3308)
- Production settings: Configured for live server

**Server Configuration**:
- `.htaccess`: Security headers, cache control, compression, MIME types
- Error handling: Custom 404 and 500 error pages
- Content Security Policy (CSP) configured for external services

## Main Components

### Frontend System
**Entry Point**: `index.php`
**Key Files**:
- `header.php`, `footer.php`: Common page elements
- `*.php`: Content pages (about.php, blog.php, training.php, etc.)
- `action/*.php`: Data retrieval scripts

**Features**:
- Responsive design
- Client testimonials
- Service listings
- Blog/news system
- Training program catalog
- Contact forms

### Admin System
**Entry Point**: `saiebadmin25/index.php`
**Key Files**:
- `saiebadmin25/login.php`: Authentication
- `saiebadmin25/action/*.php`: Admin API endpoints
- `saiebadmin25/*-add.php`, `*-edit.php`: Content management forms

**Features**:
- Dashboard with request management
- Content management (services, training, news)
- Client management
- Media library
- User authentication

## Database Structure
**Prefix**: `sa_`
**Main Tables**:
- Client requests
- Services (business, individual, financial)
- Training programs
- News/blog articles
- Testimonials
- Media library

## Security Features
- SQL injection protection via parameterized queries
- XSS protection headers
- CSRF protection
- Content Security Policy
- Environment-based configuration
- Password-protected admin area

## Icon System
**Implementation**: 
- Multiple icon libraries (Font Awesome, Bootstrap Icons, Unicons)
- Fallback system for icon loading failures
- Custom CSS fixes for social media icons
- JavaScript-based icon monitoring and recovery

## Performance Optimizations
- Browser caching (CSS/JS: 1 month, Images: 1 month, HTML: 1 hour)
- Gzip compression for text-based assets
- Optimized image loading
- CDN fallbacks for critical resources