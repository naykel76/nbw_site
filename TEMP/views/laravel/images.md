# Images

Add storage driver to `disks` in `config\filesystems.php`;

    'products' => [
        'driver' => 'local',
        'root' => storage_path('app/public/products'),
        'url' => '/storage/products',
        'visibility' => 'public',
    ],

## Add imageUrl to Model

    public function imageUrl() {
        return $this->image_name ? Storage::disk('products')->url($this->image_name) : "/svg/placeholder.svg";
    }

## Using the image

    <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}">
