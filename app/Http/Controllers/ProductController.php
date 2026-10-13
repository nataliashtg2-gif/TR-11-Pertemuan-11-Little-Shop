<?php
namespace App\Http\Controllers;
use App\Models\{Product,Category}; use Illuminate\Http\Request; use Illuminate\Support\Str;
class ProductController extends Controller {
 public function index(Request $r){$q=Product::with('category')->active();if($r->filled('q')){$s=$r->string('q');$q->where(fn($x)=>$x->where('name','like',"%$s%")->orWhere('description','like',"%$s%"));}if($r->filled('category'))$q->where('category_id',$r->integer('category'));$products=$q->latest()->paginate(12)->withQueryString();$categories=Category::orderBy('name')->get();return view('products.index',compact('products','categories'));}
 public function show(Product $product){$product->load('category');return view('products.show',compact('product'));}
 public function store(Request $r){abort_unless(in_array($r->user()->role,['admin','editor'],true),403);$d=$r->validate(['category_id'=>'required|exists:categories,id','name'=>'required|max:150','description'=>'nullable','price'=>'required|numeric|min:0','stock'=>'required|integer|min:0']);$d['slug']=Str::slug($d['name']).'-'.Str::lower(Str::random(5));$d['is_active']=$r->boolean('is_active');Product::create($d);return back()->with('success','Produk berhasil ditambahkan.');}
 public function update(Request $r,Product $product){$this->authorize('update',$product);$d=$r->validate(['category_id'=>'required|exists:categories,id','name'=>'required|max:150','description'=>'nullable','price'=>'required|numeric|min:0','stock'=>'required|integer|min:0']);$d['is_active']=$r->boolean('is_active');$product->update($d);return back()->with('success','Produk diperbarui.');}
 public function destroy(Product $product){$this->authorize('delete',$product);$product->delete();return back()->with('success','Produk dihapus.');}
}
