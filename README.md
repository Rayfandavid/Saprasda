# SISARPRAS - Modern School Infrastructure Reporting System

A modern web application for managing school infrastructure reports, built with React, TypeScript, and Supabase.

## Features

- **User Authentication**: Secure login and registration for schools
- **Dashboard**: Overview of reports and statistics
- **Infrastructure Reporting**: Detailed forms for reporting facility conditions
- **Real-time Data**: Live updates using Supabase
- **Responsive Design**: Works on all devices
- **Dark Mode**: Toggle between light and dark themes
- **Modern UI**: Clean, professional interface

## Technology Stack

- **Frontend**: React 18 + TypeScript + Vite
- **Styling**: Tailwind CSS
- **Database**: Supabase (PostgreSQL)
- **Authentication**: Supabase Auth
- **Icons**: Lucide React
- **Routing**: React Router DOM

## Getting Started

### Prerequisites

- Node.js 18+ 
- Supabase account

### Installation

1. Clone the repository
2. Install dependencies:
   ```bash
   npm install
   ```

3. Set up Supabase:
   - Create a new Supabase project
   - Copy your project URL and anon key
   - Create a `.env` file based on `.env.example`

4. Set up the database schema (see Database Setup below)

5. Start the development server:
   ```bash
   npm run dev
   ```

## Database Setup

You'll need to create the following tables in your Supabase database:

### Core Tables

1. **members** - User profiles
2. **halaman** - Page content
3. **tutors** - Tutor information
4. **partners** - Partner information  
5. **info** - Footer information
6. **laporan_prasarana** - Infrastructure reports
7. **laporan_sarana** - Equipment reports
8. **kebutuhan_usaha** - Business needs
9. **riwayat_laporan** - Report history

### Sample Data

The application expects some initial data:
- Halaman records with IDs 8, 9, 11 for home page content
- Info records with IDs 1-4 for footer content

## Key Features

### Authentication System
- Email/password registration and login
- Automatic user profile creation
- Session management with Supabase Auth

### Dashboard
- Statistics overview (total reports, pending, completed, costs)
- Report history with status tracking
- Dark/light mode toggle
- Responsive design

### Report Creation
- School identity information
- Infrastructure condition reporting
- Equipment condition assessment
- Automatic data validation

### Content Management
- Dynamic page content from database
- Tutor and partner profiles
- Image handling with fallbacks

## Original PHP Logic Preserved

This modern version maintains the same business logic as the original PHP application:

- User registration with NPSN validation
- Infrastructure reporting workflow
- Dashboard statistics calculation
- Content management system
- Authentication flow

## Development

### Project Structure

```
src/
├── components/     # Reusable UI components
├── contexts/       # React contexts (Auth)
├── lib/           # Utilities (Supabase client)
├── pages/         # Page components
├── types/         # TypeScript type definitions
└── App.tsx        # Main application component
```

### Key Components

- **AuthContext**: Manages user authentication state
- **Header/Footer**: Layout components with navigation
- **Dashboard**: Main user interface after login
- **BuatLaporan**: Infrastructure reporting form
- **Home**: Landing page with dynamic content

## Deployment

1. Build the application:
   ```bash
   npm run build
   ```

2. Deploy to your preferred hosting service (Netlify, Vercel, etc.)

3. Set up environment variables in your hosting platform

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## License

This project maintains the same open-source spirit as the original PHP version.

## Migration from PHP

This application is a modern replacement for the original PHP-based SISARPRAS system, offering:

- Better performance and user experience
- Modern security practices
- Real-time updates
- Mobile-responsive design
- Easier maintenance and deployment

All core functionality from the original system has been preserved and enhanced.