# SAIEB Services Website Information

## Summary
A bilingual (Arabic/English) PHP-based website for SAIEB Services, featuring business services, individual services, financial consulting, and training offerings. The site includes a client management system, blog/news functionality, and an administrative backend for content management.

## Structure
- **Root Directory**: Main website frontend files (PHP pages, CSS, JS)
- **saiebadmin25**: Administrative backend for content management
- **action**: Backend PHP scripts for database operations
- **css**: Stylesheets and font resources
- **js**: JavaScript libraries and custom scripts
- **images**: Website images, client logos, and media assets

## Language & Runtime
**Language**: PHP
**Server**: Apache with mod_rewrite, mod_headers, mod_expires, mod_deflate
**Database**: MySQL
**Frontend**: HTML5, CSS3, JavaScript

## Dependencies
**Main Dependencies**:
- jQuery (js/plugins.min.js)
- Bootstrap (saiebadmin25/plugins/bootstrap)
- Font Awesome (css/icons/font-awesome)
- Bootstrap Icons (css/icons/bootstrap-icons)
- Unicons (css/icons/unicons)
- Swiper (css/swiper.css)
- DataTables (saiebadmin25/plugins/datatables)
- Summernote Editor (saiebadmin25/plugins/summernote)
- Chart.js (saiebadmin25/plugins/chart.js)

## Security Configuration
**Headers**:
- X-Content-Type-Options: nosniff
- X-Frame-Options: SAMEORIGIN
- X-XSS-Protection: 1; mode=block
- Content-Security-Policy: Configured for self-hosted resources
- Referrer-Policy: strict-origin-when-cross-origin

**Authentication**:
- Admin login system (saiebadmin25/login.php)
- Session-based authentication

## Performance Optimization
**Caching**:
- Browser caching for static assets (1 month)
- HTML caching (1 hour)
- ETags removed for better caching

**Compression**:
- GZIP compression for text-based resources
- Image optimization settings

## Main Components

### Frontend Website
**Entry Point**: index.php
**Key Pages**:
- Home (index.php)
- About (about.php)
- Services (service-business.php, service-individual.php)
- Training (training.php)
- Financial Services (financial.php)
- Blog/News (blog.php, blog-single.php)
- Library (library.php, library-detail.php)
- Contact (contact.php)

**Template Structure**:
- Header/footer includes (header.php, footer.php)
- Action scripts for data retrieval (action/*.php)

### Admin Panel
**Entry Point**: saiebadmin25/index.php
**Key Features**:
- Dashboard with client requests
- Content management for all website sections
- Client management (clients.php)
- Service management (business/individual)
- Training course management
- News/blog article management
- Library resource management
- Client testimonials management
- Slider/banner management

**Admin Structure**:
- Authentication (login.php)
- Dashboard (index.php)
- Content editors (various *-add.php, *-edit.php files)
- Database operations (action/*.php)

## Database
**Connection**: action/db.php
**Prefix**: sa_
**Main Tables** (inferred from code):
- Client requests
- Services (business, individual)
- Training courses
- News/articles
- Library resources
- Client testimonials
- Website content/text
- Slider/banner content

## Error Handling
**Custom Error Pages**:
- 404.php (Not Found)
- 500.php (Server Error)