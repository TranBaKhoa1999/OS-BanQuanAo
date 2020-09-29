<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/', function ($request, $response, $args) {
    echo '<h2>Endpoints</h2>';
    echo '<small>* Note: với các phương thức POST, PUT, DELETE phải yêu cầu đúng phương thức và giao diện.</small>';
    // -------------------------------------------attributes
    echo '<h4 style="background:#4efc03; text-align:center;font-size:30px"> *ATTRIBUTES</h4>';
    echo '<table style="margin:auto">
        <tr>
            <th>Description</th>
            <th>Link API</th>
        </tr>
        <tr>
            <td>Get All Atrtibutes</td>
            <td>
                <a href="./api/attributes">./api/attributes</a>
            </td>
        </tr>
        <tr>
            <td>Get Single Atrtibute</td>
            <td>
                <a href="./api/attributes/1">./api/attributes/{id}</a>
            </td>
        </tr>
        <tr>
            <td>Add Atrtibute</td>
            <td>
                <a href="#">./api/attributes/add</a>
            </td>
        </tr>
        <tr>
            <td>Update Atrtibute</td>
            <td>
                <a href="#">./api/attributes/update/{id}</a>
            </td>
        </tr>
        <tr>
            <td>Delete Atrtibute</td>
            <td>
                <a href="#">./api/attributes/delete/{id}</a>
            </td>
        </tr>
    </table>';
    // -------------------------------------- brand
    echo '<h4 style="background:#66ff33; text-align:center;font-size:30px"> * BRANDS</h4>';
    echo '<table style="margin:auto">
        <tr>
            <th>Description</th>
            <th>Link API</th>
        </tr>
        <tr>
            <td>Get All Brands</td>
            <td>
                <a href="./api/brands">./api/brands</a>
            </td>
        </tr>
        <tr>
            <td>Get Single Brand</td>
            <td>
                <a href="./api/brands/1">./api/brands/{id}</a>
            </td>
        </tr>
        <tr>
            <td>Add Brand</td>
            <td>
                <a href="#">./api/brands/add</a>
            </td>
        </tr>
        <tr>
            <td>Update Atrtibute</td>
            <td>
                <a href="#">./api/brands/update/{id}</a>
            </td>
        </tr>
        <tr>
            <td>Delete Atrtibute</td>
            <td>
                <a href="#">./api/brands/delete/{id}</a>
            </td>
        </tr>
    </table>';
    // ----------------------------------------------product
    echo '<h4 style="background:#ff1a1a; text-align:center;font-size:30px"> * PRODUCTS</h4>';
    echo '<table style="margin:auto">
        <tr>
            <th>Description</th>
            <th>Link API</th>
        </tr>
        <tr>
            <td>Get All products</td>
            <td>
                <a href="./api/products">./api/products</a>
            </td>
        </tr>
        <tr>
            <td>Get Single product</td>
            <td>
                <a href="./api/products/1">./api/products/{id}</a>
            </td>
        </tr>
        <tr>
            <td>Get All Product By Cate</td>
            <td>
                <a href="./api/products/cate/1">./api/products/cate/{id_cate}</a>
            </td>
        </tr>
        <tr>
            <td>Get All Product By Brand</td>
            <td>
                <a href="./api/products/brand/1">./api/products/brand/{id_brand}</a>
            </td>
        </tr>
        <tr>
            <td>Get All Product By Cate and Brand</td>
            <td>
                <a href="./api/products/cate-brand/1/1">./api/products/cate-brand/{id_cate}/{id_brand}</a>
            </td>
        </tr>
        <tr>
            <td>Add Product</td>
            <td>
                <a href="#">./api/products/add</a>
            </td>
        </tr>
        <tr>
            <td>Update Product</td>
            <td>
                <a href="#">./api/products/update/{id}</a>
            </td>
        </tr>
        <tr>
            <td>Delete Atrtibute</td>
            <td>
                <a href="#">./api/products/delete/{id}</a>
            </td>
        </tr>
    </table>';
    // ---------------------------------------------- bill
    echo '<h4 style="background:tomato; text-align:center;font-size:30px"> * BILL</h4>';
    echo '<table style="margin:auto">
        <tr>
            <th>Description</th>
            <th>Link API</th>
        </tr>
        <tr>
            <td>Get All Bills</td>
            <td>
                <a href="./api/bills">./api/bills</a>
            </td>
        </tr>
        <tr>
            <td>Get Single bill</td>
            <td>
                <a href="./api/bills/1">./api/bills/{id}</a>
            </td>
        </tr>
        <tr>
            <td>Add New Bill - ADMIN PAGE</td>
            <td>
                <a href="#">./api/bills/addbyadmin</a>
            </td>
        </tr>
        <tr>
            <td>Change Status Bill</td>
            <td>
                <a href="#">./api/bills/update-status/{id}/{status}</a>
            </td>
        </tr>
        <tr>
            <td>Add Product To Bill</td>
            <td>
                <a href="#">./api/bills/addproduct</a>
            </td>
        </tr>
        <tr>
            <td>Delete product in Bill</td>
            <td>
                <a href="#">./api/bills/deleteproduct/{id_bill}/{id_product}</a>
            </td>
        </tr>
    </table>';
     // ---------------------------------------------- Customer
     echo '<h4 style="background:#ffd11a; text-align:center;font-size:30px"> * CUSTOMER</h4>';
     echo '<table style="margin:auto">
         <tr>
             <th>Description</th>
             <th>Link API</th>
         </tr>
         <tr>
             <td>Get All Customer</td>
             <td>
                 <a href="./api/customers">./api/customers</a>
             </td>
         </tr>
         <tr>
             <td>Get Single customer</td>
             <td>
                 <a href="./api/customers/1">./api/customers/{id}</a>
             </td>
         </tr>
         <tr>
             <td>Add New Customer</td>
             <td>
                 <a href="#">./api/customers/add</a>
             </td>
         </tr>
         <tr>
             <td>Update Customer</td>
             <td>
                 <a href="#">./api/customers/update/{email}</a>
             </td>
         </tr>
     </table>';
     // ---------------------------------------------- Categories
     echo '<h4 style="background:#ffff33; text-align:center;font-size:30px"> * CATEGORIES</h4>';
     echo '<table style="margin:auto">
         <tr>
             <th>Description</th>
             <th>Link API</th>
         </tr>
         <tr>
             <td>Get All Categories</td>
             <td>
                 <a href="./api/categories">./api/categories</a>
             </td>
         </tr>
         <tr>
             <td>Get Single Category</td>
             <td>
                 <a href="./api/categories/1">./api/categories/{id}</a>
             </td>
         </tr>
         <tr>
             <td>Add New Category</td>
             <td>
                 <a href="#">./api/categories/add</a>
             </td>
         </tr>
         <tr>
             <td>Update Category</td>
             <td>
                 <a href="#">./api/categories/update/{id}</a>
             </td>
         </tr>
         <tr>
             <td>Update total product cate</td>
             <td>
                 <a href="#">./api/categories/update-count/{id}</a>
             </td>
         </tr>
         <tr>
             <td>Delete Category</td>
             <td>
                 <a href="#">./api/categories/delete/{id}</a>
             </td>
         </tr>
     </table>';
      // ---------------------------------------------- Revenue
      echo '<h4 style="background:#ffbf80; text-align:center;font-size:30px"> * REVENUE </h4>';
      echo '<table style="margin:auto">
          <tr>
              <th>Description</th>
              <th>Link API</th>
          </tr>
          <tr>
              <td>Get Revenue Of Year</td>
              <td>
              <a href="./api/revenue/2020">./api/revenue/{year}</a>
              </td>
          </tr>
          <tr>
              <td>Get Revenue Of Month</td>
              <td>
              <a href="./api/revenue/2020/9">./api/revenue/{year}/{month}</a>
              </td>
          </tr>
          <tr>
              <td>Get Revenue Of Day</td>
              <td>
                  <a href="./api/revenue/2020/9/28">./api/revenue/{year}/{month}/{day}</a>
              </td>
          </tr>
      </table>';
      // ---------------------------------------------- Statistical
      echo '<h4 style="background:#ffd9b3; text-align:center;font-size:30px"> * STATISTICAL </h4>';
      echo '<table style="margin:auto">
          <tr>
              <th>Description</th>
              <th>Link API</th>
          </tr>
          <tr>
              <td>Get Statistical of all products</td>
              <td>
              <a href="./api/statistical">./api/statistical</a>
              </td>
          </tr>
          <tr>
              <td>Get Statistical Of One Product</td>
              <td>
              <a href="./api/statistical/1">./api/statistical/{id_product}</a>
              </td>
          </tr>
          <tr>
              <td>Update View count of product</td>
              <td>
                  <a href="#">./api/statistical/update-view/{id_product}</a>
              </td>
          </tr>
      </table>';
      // ---------------------------------------------- Storage
      echo '<h4 style="background:#ffcccc; text-align:center;font-size:30px"> * STORAGE </h4>';
      echo '<table style="margin:auto">
          <tr>
              <th>Description</th>
              <th>Link API</th>
          </tr>
          <tr>
              <td>Get Storage</td>
              <td>
              <a href="./api/storage">./api/storage</a>
              </td>
          </tr>
          <tr>
              <td>Get Single</td>
              <td>
              <a href="./api/storage/1">./api/storage/{id_product}</a>
              </td>
          </tr>
      </table>';
      // ---------------------------------------------- Method
      echo '<h4 style="background:pink; text-align:center;font-size:30px"> * METHODS </h4>';
      echo '<table style="margin:auto">
          <tr>
              <th>Description</th>
              <th>Link API</th>
          </tr>
          <tr>
              <td>Get All Shipping Methods</td>
              <td>
              <a href="./api/shipping">./api/shipping</a>
              </td>
          </tr>
          <tr>
              <td>Get All Payment Methods</td>
              <td>
              <a href="./api/payment">./api/payment</a>
              </td>
          </tr>
          <tr>
              <td>Get Single Shipping Method</td>
              <td>
              <a href="./api/shipping/1">./api/shipping/{id}</a>
              </td>
          </tr>
          <tr>
              <td>Get Single Payment Method</td>
              <td>
              <a href="./api/payment/1">./api/payment/{id}</a>
              </td>
          </tr>
          <tr>
              <td>Change Status Shipping method</td>
              <td>
              <a href="#">./api/shipping/update-status/{id}</a>
              </td>
          </tr>
          <tr>
              <td>Change Status Payment method</td>
              <td>
              <a href="#">./api/payment/update-status/{id}</a>
              </td>
          </tr>
      </table>';
});
$app->get('/api', function ($request, $response, $args) {
    echo '<a type="button" href="./" >Wrong API. Back</a>';
});
$app->get('/api/', function ($request, $response, $args) {
    echo '<a type="button" href="./" >Wrong API. Back</a>';
});
?>