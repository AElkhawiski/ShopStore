<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use App\Models\Category;
use App\Models\Order;
use PDF;
class AdminController extends Controller
{
    public function view_category(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $data=category::all();
        return view('admin.category',compact('data'));
    }
    public function add_category(Request $request): \Illuminate\Http\RedirectResponse
    {
        $data = new Category;
        $data->category_name = $request->category;
        $data->save();
        return redirect()->back()->with('message','Category added successfully');
    }
    public function delete_category($id): \Illuminate\Http\RedirectResponse
    {
        $data =category::find($id);
        $data->delete();
        return redirect()->back()->with('message','Category Deleted successfully');
    }
    public function view_product(): \Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Contracts\Foundation\Application
    {
        $category =Category::all();
        return view('admin.product',compact('category'));
    }
    public function add_product(Request $request)
    {
        $product = new Product;
        $product->title = $request->title;
        $product->description = $request->description;
        $product->price = $request->price;
        $product->quantity = $request->quantity;
        $product->discount_price=$request->dis_price;
        $product->category = $request->category;
        $image=$request->image;
        $imagename=time().'.'.$image->getClientOriginalExtension();
        $request->image->move('product', $imagename);
        $product->image = $imagename;
        $product->save();
        return redirect()->back()->with('message','Product Added successfully');

    }

    public function show_all_products()
    {
        $product=product::all();
        return view('admin.show_all_products',compact('product'));
    }

    public function delete_product($id)
    {
        $product=product::find($id);
        $product->delete();
        return redirect()->back()->with('message','Product Deleted Successfully');
    }

    public function update_product($id)
    {
        $product=product::find($id);
        $category=product::all();
        return view('admin.update_product',compact('product','category'));
    }

    public function update_product_confirm(Request $request,$id)
    {
        $product=product::find($id);

        $product->title=$request->title;
        $product->description=$request->description;
        $product->price=$request->price;
        $product->discount_price=$request->discount_price;
        $product->category=$request->category;
        $product->quantity=$request->quantity;
        $image=$request->image;
        if($image)
        {
            $imagename=time().'.'.$image->getClientOriginalExtension();
            $request->image->move('product',$imagename);
            $product->image=$imagename;
        }

        $product->save();
        return redirect()->back()->with('message','product updated successfully');
    }

    public function order()
    {
        $order=order::all();
       return view('admin.order',compact('order'));
    }

    public function delivered($id)
    {
        $order=order::find($id);

        $order->delivery_status="delivered";

        $order->payment_status="Paid";

        $order->save();

        return redirect()->back();
    }
    public function print_pdf($id){
        $order=order::find($id);
        $pdf=PDF::loadView('admin.pdf',compact('order'));
        return $pdf->download('order_details.pdf');
    }


}
