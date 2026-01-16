# Viajes al Templo

This is a Laravel application designed to help organizers and participants travel to the LDS Temple. The app facilitates the organization of temple trips by managing stakes, wards, trips, passengers, seats, payments, and temple ordinances.

## Features

- **User Authentication**: Secure login with Laravel Fortify and two-factor authentication support
- **Stake Management**: Organize users and wards within church stakes
- **Trip Organization**: Create and manage temple trips with capacity, cost, and scheduling
- **Passenger Management**: Register and track temple-goers with personal information and membership details
- **Seat Assignment**: Manage seating arrangements for trips
- **Payment Tracking**: Record and monitor trip payments
- **Ordinance Scheduling**: Track temple ordinances and appointments
- **Admin Dashboard**: Comprehensive admin interface for managing all entities
- **Responsive Design**: Built with Tailwind CSS for mobile-friendly experience

## Technologies Used

- **Backend**: Laravel 12.x, PHP 8.2+
- **Frontend**: Livewire, Volt, Tailwind CSS, Vite
- **Database**: SQLite (default), supports MySQL/PostgreSQL
- **Authentication**: Laravel Fortify
- **Testing**: Pest PHP
- **Build Tool**: Vite

## Installation

### Prerequisites

- PHP 8.2 or higher
- Composer
- Node.js and npm
- SQLite (or MySQL/PostgreSQL)

### Setup Steps

1. **Clone the repository**
   ```bash
   git clone <repository-url>
   cd viajes-al-templo/viaje
   ```

2. **Install PHP dependencies**
   ```bash
   composer install
   ```

3. **Install Node.js dependencies**
   ```bash
   npm install
   ```

4. **Environment Configuration**
   ```bash
   cp .env.example .env
   ```
   
   Update the `.env` file with your database and other configuration settings.

5. **Generate Application Key**
   ```bash
   php artisan key:generate
   ```

6. **Run Database Migrations**
   ```bash
   php artisan migrate
   ```

7. **Build Assets**
   ```bash
   npm run build
   ```

8. **Start the Development Server**
   ```bash
   php artisan serve
   ```

   For frontend development with hot reloading:
   ```bash
   npm run dev
   ```

### Quick Setup (using Composer script)

Alternatively, you can use the built-in setup script:
```bash
composer run setup
```

## Usage

### Admin Features

Access the admin panel at `/admin` to manage:

- **Stakes**: Church organizational units
- **Wards**: Local congregations within stakes
- **Users**: System users with stake assignments
- **Trips**: Temple trip planning and management
- **Passengers**: Temple-goer registration and information
- **Seats**: Trip seating assignments
- **Payments**: Financial tracking for trips
- **Ordinances**: Temple ordinance records
- **Appointments**: Scheduled temple sessions

### User Features

- **Dashboard**: Personal trip and payment overview
- **Profile Management**: Update personal information
- **Trip Registration**: Sign up for available temple trips
- **Payment Tracking**: View payment status and history

## Database Schema

The application uses the following main entities:

- **Stakes**: Top-level church organizations
- **Wards**: Local congregations
- **Users**: System users (organizers and participants)
- **Trips**: Organized temple visits
- **Passengers**: Individuals attending trips
- **Seats**: Seating assignments on trips
- **Payments**: Financial transactions
- **Ordinances**: Temple ordinance records
- **Appointments**: Scheduled temple sessions

## Testing

Run the test suite using Pest PHP:

```bash
./vendor/bin/pest
```

## Contributing

1. Fork the repository
2. Create a feature branch (`git checkout -b feature/amazing-feature`)
3. Commit your changes (`git commit -m 'Add some amazing feature'`)
4. Push to the branch (`git push origin feature/amazing-feature`)
5. Open a Pull Request

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Support

For support and questions, please open an issue in the repository or contact the development team.
