<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Repositories\ProductRepository;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Builder;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Support\Facades\Storage;




class ProductController extends Controller
{

    /** @var ProductRepository $productRepository*/
    private $productRepository;

    public function __construct(ProductRepository $productRepo)
     {
         $this->productRepository = $productRepo;
         $this->middleware('auth');
     }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::inRandomOrder()
        //->whereActive(true)
        //->take(16)
        ->get();
        return view('products.index', compact('products'));
    }

    public function welcome()
    {
        $products = Product::inRandomOrder()
        //->whereActive(true)
        //->take(16)
        ->get();

        $categories = Category::inRandomOrder()
        //->whereActive(true)
        //->take(16)
        ->get();
        
        return view('welcome', compact('products', 'categories'));
    }

    

    public function list()
    {
        $products = Product::inRandomOrder()
        //->whereActive(true)
        //->take(16)
        ->get();
        return view('admin.products.product-list', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::inRandomOrder()
        ->get();

        return view('admin.products.add-product', compact('categories'));
    }


        /**
     * Store a newly created Product in storage.
     *
     * @param CreateProductRequest $request
     *
     * @return Response
     */
    public function store(CreateProductRequest $request)
    {

        $path = $request->file('image')->store('public/images');
        $input = $request->all();
        $productInfo=[
            'name' => $input['name'],
            'description' => $input['description'],
            'price' => $input['price'],
            'active' => $input['active'],
            'image'=> $path,
        ];

        $product = $this->productRepository->create($productInfo);


        return redirect(route('admin.products.product-list'))->with('success' , 'Product saved successfully');
    }

    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = $this->productRepository->find($id);

        // if (empty($epreuve)) {
        //     Flash::error('Epreuve not found');

        //     return redirect(route('epreuves.index'));
        // }

        return view('products.details-product', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = $this->productRepository->find($id);

        // if (empty($product)) {
        //     Flash::error('Epreuve not found');

        //     return redirect(route('epreuves.index'));
        // }

        return view('admin.product.product-edit')->with('product', $product);
    }
    /**
     * Update the specified Product in storage.
     *
     * @param int $id
     * @param UpdateProductRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateProductRequest $request)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            return redirect(route('admin.products.product-list'));
        }

        $input = $request->all();
        
        $productInfo=[
            'name' => $input['name'],
            'description' => $input['description'],
            'price' => $input['price'],
            'active' => true,
        ];

        $product = $this->productRepository->update($productInfo, $id);

        //Flash::success('Epreuve updated successfully.');

        return redirect(route('admin.products.product-list'));
    }

    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = $this->productRepository->find($id);

        if (empty($product)) {
            //Flash::error('Epreuve not found');

            return redirect(route('admin.products.product-list'));
        }
        Storage::delete($product->image);
        $this->productRepository->delete($id);

        //Flash::success('Epreuve deleted successfully.');

        return redirect(route('admin.products.product-list'));
    }


    public function recherche(){

        if(request()->categorie_id){
            $products = Product::where('category_id', request()->categorie_id)  
            ->get();

            //dd(request()->categorie_id);

        }else{
            $q = request()->input('q');
            $products = Product::inRandomOrder()
            ->where('name', 'like', "%$q%")
            ->orWhere('description', 'like', "%$q%")
            ->get();
        }

        return view('products.recherche', compact('products'));
    }

    
}
