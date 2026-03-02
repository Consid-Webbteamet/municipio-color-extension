# Municipio Color Extension

WordPress plugin that adds extended color palettes to the Municipio Customizer.

## Requirements

- PHP 8.0+
- WordPress
- Municipio (the plugin uses `\Municipio\Customizer\KirkiField` and `\Municipio\Customizer`)

## Installation

### Composer

```bash
composer require consid-webbteamet/municipio-color-extension
```

In Bedrock, the plugin is installed to `web/app/plugins/municipio-color-extension` via `type: wordpress-plugin`.

### Manual

1. Place the plugin in `wp-content/plugins/municipio-color-extension`
2. Activate the plugin in WordPress admin

## Functionality

The plugin registers four extended color palettes in the Customizer:

- Primary
- Secondary
- Tertiary
- Quaternary

Each palette exposes shades (`50`-`500`) as CSS variables on `:root`, for example `--color-primary-500`.

## Release and Packagist

1. Ensure `composer.json` has the correct `name`, `type`, `description`, and `license`.
2. Commit and push to a public Git repository (GitHub/GitLab/Bitbucket).
3. Create a semver tag and push it:

```bash
git tag v1.2.1
git push origin v1.2.1
```

4. Log in to [packagist.org](https://packagist.org), click **Submit**, and enter the repository URL.
5. In the package settings on Packagist, enable the GitHub/GitLab hook for automatic updates on push/tag.

## Development

No build process is required. The plugin consists of a single PHP file loaded directly by WordPress.
