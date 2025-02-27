@extends('admin.layouts.admin-masterpage')

@section('content')
<div class="container">
    <div class="page-inner">
        <div class="col-md-12">
            <div class="card">
                            <div class="card-body">
                <!-- Modal -->
                <div
                  class="modal fade"
                  id="addRowModal"
                  tabindex="-1"
                  role="dialog"
                  aria-hidden="true"
                >
                  <div class="modal-dialog" role="document">
                    <div class="modal-content">
                      <div class="modal-header border-0">
                        <h5 class="modal-title">
                          <span class="fw-mediumbold"> New</span>
                          <span class="fw-light"> Row </span>
                        </h5>
                        <button
                          type="button"
                          class="close"
                          data-dismiss="modal"
                          aria-label="Close"
                        >
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <p class="small">
                          Create a new row using this form, make sure you
                          fill them all
                        </p>
                        <form>
                          <div class="row">
                            <div class="col-sm-12">
                              <div class="form-group form-group-default">
                                <label>Name</label>
                                <input
                                  id="addName"
                                  type="text"
                                  class="form-control"
                                  placeholder="fill name"
                                />
                              </div>
                            </div>
                            <div class="col-md-6 pe-0">
                              <div class="form-group form-group-default">
                                <label>Position</label>
                                <input
                                  id="addPosition"
                                  type="text"
                                  class="form-control"
                                  placeholder="fill position"
                                />
                              </div>
                            </div>
                            <div class="col-md-6">
                              <div class="form-group form-group-default">
                                <label>Office</label>
                                <input
                                  id="addOffice"
                                  type="text"
                                  class="form-control"
                                  placeholder="fill office"
                                />
                              </div>
                            </div>
                          </div>
                        </form>
                      </div>
                      <div class="modal-footer border-0">
                        <button
                          type="button"
                          id="addRowButton"
                          class="btn btn-primary"
                        >
                          Add
                        </button>
                        <button
                          type="button"
                          class="btn btn-danger"
                          data-dismiss="modal"
                        >
                          Close
                        </button>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="table-responsive">
                  <table
                    id="add-row"
                    class="display table table-striped table-hover"
                  >
                    <thead>
                      <tr>
                        <th>order id</th>
                        <th>total amount</th>
                        <th>after discount</th>
                        <th>order state</th>
                        <th>payment method</th>
                        <th>payment status</th>

                                                <th style="width: 10%">Action</th>
                      </tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th>order id</th>
                        <th>total amount</th>
                        <th>after discount</th>
                        <th>order state</th>
                        <th>payment method</th>
                        <th>payment status</th>

                        <th>Action</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      @foreach ($orders as $order)
                      <tr>
                        <td>{{$order->id}}</td>
                        <td>{{$order->total_amount}}</td>
                        <td>{{$order->total_amount_after_discount}}</td>
                        <td>{{$order->status}}</td>
                        <td>{{$order->payment_method}}</td>
                        <td>{{$order->payment_status}}</td>

                                                <td>
                          <div class="form-button-action">
                            <a
                              href="{{ route('admin.orders.edit', $order) }}"
                              type="button"
                              data-bs-toggle="tooltip"
                              title=""
                              class="btn btn-link btn-primary btn-lg"
                              data-original-title="Edit Task"
                            >
                              <i class="fa fa-edit"></i>
                            </a>

                            <a
                              href="{{ route('admin.orders.show', $order) }}"
                              type="button"
                              data-bs-toggle="tooltip"
                              title=""
                              class="btn btn-link btn-primary btn-lg"
                              data-original-title="Edit Task"
                            >
                            <i class="fas fa-arrow-alt-circle-right"></i>

                            </a>


                            <!-- Delete Button -->
                          {{-- <form action="{{ route('admin.orders.destroy', $order->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this order?');">
                            @csrf
                            @method('DELETE') <!-- Spoof the DELETE method -->
                            <button
                              type="submit"
                              data-bs-toggle="tooltip"
                              title=""
                              class="btn btn-link btn-danger btn-lg"
                              data-original-title="Remove"
                            >
                              <i class="fa fa-times"></i>
                            </button>
                        </form> --}}
                                                                                
                          </div>
                        </td>
                      </tr>
                  @endforeach

                  
                      
                    </tbody>
                  </table>
                </div>
              </div>
            </div>
          </div>
      </div>
    </div>
  </div>
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha384-vtXRMe3mGCbOeY7l30aIg8H9p3GdeSe4IFlP6G8JMa7o7lXvnz3GFKzPxzJdPfGK" crossorigin="anonymous"></script>
  
  <script>
    console.log(111);
    // $("#alert_demo_7").click(function (e) {
    //         swal({
    //           title: "Are you sure?",
    //           text: "You won't be able to revert this!",
    //           type: "warning",
    //           buttons: {
    //             confirm: {
    //               text: "Yes, delete it!",
    //               className: "btn btn-success",
    //             },
    //             cancel: {
    //               visible: true,
    //               className: "btn btn-danger",
    //             },
    //           },
    //         }).then((Delete) => {
    //           if (Delete) {
    //             swal({
    //               title: "Deleted!",
    //               text: "Your file has been deleted.",
    //               type: "success",
    //               buttons: {
    //                 confirm: {
    //                   className: "btn btn-success",
    //                 },
    //               },
    //             });
    //           } else {
    //             swal.close();
    //           }
    //         });
    //       });
  </script>
  
@endsection