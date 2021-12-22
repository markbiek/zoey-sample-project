# zoey-sample-project

This is a simple PHP project which demonstrates how the [zoey-account-permissions](https://github.com/markbiek/zoey-account-permissions) package can be used.

## Setup

To initialize the application with default data, simply run the `npm run setup` command. This will handle installing all required packages, initializing the database, and populating the database with test data.

## Using the application

On page load, the application displays a list of accounts (denoting if any of them are admin accounts and/or overdue). Clicking on an account name will begin impersonating that account.

Once an account is being impersonated, the Checkout link and Product Lists will appear.

Clicking the Checkout link will show a permission denied message if the account is overdue.

The application will also show if an account doesn't have permission to access a particular product list. Clicking on a product in that list will show a permission denied message. Clicking on a product that the account has access to will show some minimal information about the product.

## Testing

The command `npm test` will run a set of Pest tests which tests some basic functionality.

## Technologies

- Composer for dependencies
- TailwindCSS for minimal styling
- Simple routing via .htaccess
- Laravel Blade for templating
- Illuminate/Database for db access
- Phinx for database migrations
- DotEnv for environment configuration
