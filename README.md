# ROSA PHP Simple App

This repository contains a simple PHP application designed for deployment on Red Hat OpenShift on AWS (ROSA). The application serves as a dashboard that displays pod identity, database configuration status, and connectivity probes to external and internal services.

## Features

- **Pod Identity Display**: Shows the hostname of the running pod
- **Database Configuration Check**: Verifies if database secrets are loaded via environment variables
- **Connectivity Probes**: Tests connections to external services (e.g., google.com) and internal Kubernetes services
- **Containerized Deployment**: Ready for deployment on ROSA using secure RHEL or Alpine images

## Prerequisites

- PHP 8.3 or higher
- Composer (for dependency management)
- Docker (for containerization)
- Access to a Red Hat OpenShift cluster (ROSA)

## Local Development

1. **Clone the repository**:
   ```bash
   git clone https://github.com/froberge/ROSA_PHP_SIMPLE_APP.git
   cd ROSA_PHP_SIMPLE_APP
   ```

2. **Install dependencies**:
   ```bash
   composer install
   ```

3. **Run the application locally**:
   ```bash
   php -S localhost:8000
   ```

   Open your browser to `http://localhost:8000` to view the dashboard.

## Deployment on ROSA

### Using RHEL Universal Base Image (Recommended for ROSA)

1. Use the provided RHEL Containerfile example in `documentations/rhel_Contrainerfile-example`
2. Build and push the image to your container registry
3. Deploy to OpenShift using the image

### Using Alpine Image

1. Use the provided Alpine Containerfile example in `documentations/alpine-Containerfile-example`
2. Build and push the image to your container registry
3. Deploy to OpenShift using the image

### Environment Variables

Set the following environment variables in your OpenShift deployment:

- `DB_PASSWORD`: Database password (optional, for secret loading verification)

## Project Structure

```
ROSA_PHP_SIMPLE_APP/
├── index.php                 # Main application file
├── composer.json             # PHP dependencies
├── README.md                 # This file
└── documentations/
    ├── alpine-Containerfile-example  # Alpine-based container build example
    └── rhel_Contrainerfile-example   # RHEL-based container build example
```

## Contributing

1. Fork the repository
2. Create a feature branch
3. Make your changes
4. Submit a pull request

## License

This project is licensed under the MIT License - see the LICENSE file for details.
