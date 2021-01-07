@php echo "<?php";
@endphp

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cart;
use App\Models\Product;

class CartController extends Controller
{
  public function index()
  {
    $items = [];

    Cart::getContent()->each(function($item) use (&$items) {
      $items[] = $item;
    });

    return response()->json([
      'items' => $items,
    ]);
  }

  public function count()
  {
    $cartCount = Cart::getContent()->count();

    return response()->json([
      'count' => $cartCount,
    ]);
  }

  public function add(Request $request)
  {
    $product = Product::find($request->id);
    $quantity = $request->quantity ? $request->quantity : 1;
    $item = Cart::add([
      'id' => $product->id,
      'name' => $product->name,
      'price' => $product->price,
      'quantity' => $quantity,
      'attributes' => [],
      'associatedModel' => $product
    ]);

    $product->quantity = $quantity;

    return response()->json([
      'product' => $product,
    ], 201);
  }

  public function update(Request $request, Product $product)
  {
    Cart::update($product->id, [
      'quantity' => [
        'relative' => false,
        'value' => $request->quantity
      ]
    ]);

    return response()->json(null, 201);
  }

  public function delete($id)
  {
    Cart::remove($id);
    return response()->json(null, 204);
  }

  public function details()
  {
    return response()->json([
      'details' => [
        'total_quantity' => Cart::getTotalQuantity(),
        'sub_total' => Cart::getSubTotal(),
        'total' => Cart::getTotal(),
      ],
    ], 201);
  }

}
