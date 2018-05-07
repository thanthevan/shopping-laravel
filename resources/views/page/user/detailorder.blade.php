
                                        <table class="table" >
                                            <thead class="thead-inverse">
                                                <tr>
                                                    <th style="min-width:70px"><strong>ID</strong>
                                                    <th><strong>Tên sản phẩm</strong>
                                                    </th>
                                                    <th><strong>Danh mục</strong>
                                                    </th>
                                                    <th><strong>Đơn giá</strong>
                                                    </th>
                                                    <th><strong>Số lượng</strong>
                                                    </th>
                                                    <th><strong>Tổng cộng</strong>
                                                    </th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @php
                                                    $total=0;
                                                @endphp
                                               @isset ($orderdetails)
                                                   
                                               
                                                @foreach ($orderdetails as $orderdetail)
                                                <tr>
                                                    <td>{{$orderdetail->id}}</td>
                                                    <td>{{$orderdetail->product_name}}</td>
                                                    <td>{{category_name_by_pi($orderdetail->product_id)}}</td>
                                                    <td>{{number_format(unit_price($orderdetail->product_id))}} VNĐ</td>
                                                    <td>{{$orderdetail->amount}}</td>
                                                    
                                                    <td>{{number_format(unit_price($orderdetail->product_id)*$orderdetail->amount)}} VNĐ</td>
                                                </tr>
                                                @php
                                                    $total+=unit_price($orderdetail->product_id)*$orderdetail->amount;
                                                @endphp
                                        @endforeach
                                        @endisset
                                            </tbody>
                                        </table>
                      