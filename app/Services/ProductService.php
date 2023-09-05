<?php
// app/Services/ProductService.php
namespace App\Services;

use App\Repositories\ProductRepositoryInterface;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepositoryInterface $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    public function getAllProducts()
    {
        return $this->productRepository->all();
    }

    public function getProductById($id)
    {
        return $this->productRepository->find($id);
    }

    public function createProduct(array $data)
    {
        return $this->productRepository->create($data);
    }

    public function updateProduct($product, array $data)
    {
        return $this->productRepository->update($product, $data);
    }

    public function deleteProduct($id)
    {
        return $this->productRepository->delete($id);
    }

}
