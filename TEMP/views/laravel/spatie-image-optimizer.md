# Spatie Packages


## Image-Optimizer

https://github.com/spatie/image-optimizer

https://github.com/spatie/laravel-image-optimizer

```bash
composer require spatie/laravel-image-optimizer
```

```bash
sudo apt install jpegoptim optipng pngquant gifsicle
sudo npm install -g svgo
```

```php
// the image will be replaced with an optimized version which should be smaller
app(Spatie\ImageOptimizer\OptimizerChain::class)->optimize($pathToImage);
// if you use a second parameter the package will not modify the original
app(Spatie\ImageOptimizer\OptimizerChain::class)->optimize($pathToImage, $pathToOptimizedImage);
```

