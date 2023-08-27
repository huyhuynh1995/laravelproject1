<div>
    <div class="py-3 py-md-4 checkout">
        <div class="container">
            <h4>Thanh toán</h4>
            <hr>
            @if($this->totalProductAmount != '0')
            <div class="row">
                <div class="col-md-12 mb-4">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Số lượng sản phẩm :
                            <span class="float-end">{{ number_format($this->totalProductAmount) }} VND</span>
                        </h4>
                        <hr>
                        <small>* Giao hàng 3 - 5 ngày</small>
                        <br/>
                        <small>* Miễn phí ship nội thành</small>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="shadow bg-white p-3">
                        <h4 class="text-primary">
                            Thông tin cơ bản
                        </h4>
                        <hr>
                        
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <label>Tên Khach Hàng: </label>
                                <input type="text" wire:model.defer="fullname" id="fullname" class="form-control" placeholder="Enter Full Name" />
                                @error('fullname') <small class="text-danger">{{ $message }}</small>  @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Số điện thoại: </label>
                                <input type="number" wire:model.defer="phone" id="phone" class="form-control" placeholder="Enter Phone Number" />
                                @error('phone') <small class="text-danger">{{ $message }}</small>  @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Email: </label>
                                <input type="email" wire:model.defer="email" id="email" class="form-control" placeholder="Enter Email Address" />
                                @error('email') <small class="text-danger">{{ $message }}</small>  @enderror
                            </div>
                            <div class="col-md-6 mb-3">
                                <label>Pin-code (Zip-code): </label>
                                <input type="number" wire:model.defer="pincode" id="pincode" class="form-control" placeholder="Enter Pin-code" />
                                @error('pincode') <small class="text-danger">{{ $message }}</small>  @enderror
                            </div>
                            <div class="col-md-12 mb-3">
                                <label>Địa chỉ nhận hàng: </label>
                                <textarea wire:model.defer="address" id="address" class="form-control" rows="2"></textarea>
                                @error('address') <small class="text-danger">{{ $message }}</small>  @enderror
                            </div>
                            <div class="col-md-12 mb-3" wire:ignore>
                                <label>Select Payment Mode: </label>
                                <div class="d-md-flex align-items-start">
                                    <div class="nav col-md-3 flex-column nav-pills me-3" id="v-pills-tab" role="tablist" aria-orientation="vertical">
                                        <button class="nav-link fw-bold" active id="cashOnDeliveryTab-tab" data-bs-toggle="pill" data-bs-target="#cashOnDeliveryTab" type="button" role="tab" aria-controls="cashOnDeliveryTab" aria-selected="true" wire:loading.attr="disabled">Thanh toán tiền mặt</button>
                                        <button class="nav-link fw-bold" id="onlinePayment-tab" data-bs-toggle="pill" data-bs-target="#onlinePayment" type="button" role="tab" aria-controls="onlinePayment" aria-selected="false" wire:loading.attr="disabled">Thanh toán Banking</button>
                                    </div>
                                    <div class="tab-content col-md-9" id="v-pills-tabContent">
                                        <div class="tab-pane active show fade" id="cashOnDeliveryTab" role="tabpanel" aria-labelledby="cashOnDeliveryTab-tab" tabindex="0">
                                            <h6>Thanh toán tiền mặt</h6>
                                            <hr/>
                                            <button type="button" wire:loading.attr="disabled" wire:click.defer="codOrder" class="btn btn-primary">
                                            <span wire:loading.remove wire:target="codOrder">Thanh toán khi nhận hàng</span>
                                            <span wire:loading wire:target="codOrder">Đặt hàng </span>
                                            </button>

                                        </div>
                                        <div class="tab-pane fade" id="onlinePayment" role="tabpanel" aria-labelledby="onlinePayment-tab" tabindex="0">
                                            <h6>Thanh toán Banking</h6>
                                            <hr/>
                                            {{-- <button type="button" class="btn btn-warning" wire:loading.attr="disabled">Thanh toán ngay (Online Payment)</button> --}}
                                            <div>
                                                <div id="paypal-button-container"></div>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
               

                    </div>
                </div>

            </div>
            @else
            <div class="card card-body shadow text-center p-md-5">
                <h4>Không có sản phẩm nào trong giỏ hàng</h4>
                <a href="{{ url('collections') }}" class="btn btn-warning">Shop Now</a>
            </div>
            @endif
        </div>
    </div>
</div>

@push('scripts')
    <script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
    <script>
      paypal.Buttons({
        onClick()  {

          // Show a validation error if the checkbox is not checked
          if (!document.getElementById('fullname').value 
              || !document.getElementById('phone').value
              || !document.getElementById('email').value
              || !document.getElementById('pincode').value 
              || !document.getElementById('address').value
              ) 
          {
            Livewire.emit('validationForAll');
            return false;
          }else{
            @this.set('fullname',document.getElementById('fullname').value);
            @this.set('email',document.getElementById('email').value);
            @this.set('phone',document.getElementById('phone').value);
            @this.set('pincode',document.getElementById('pincode').value);
            @this.set('address',document.getElementById('address').value);
          }
        },
        // Order is created on the server and the order id is returned
        createOrder() {
          return action.order.create({
            purchase_units: [{
                amount: {
                    value: "{{ $this->totalProductAmount }}"
                }
            }]
          });
        },
        // Finalize the transaction on the server after payer approval
        onApprove: (data, actions) => {
          return actions.order.capture().then(function(orderData){
            // Successful capture! For dev/demo purposes:
            console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
            const transaction = orderData.purchase_units[0].payments.captures[0];
            if(transaction.status == "COMPLETED")
            {
                Livewire.emit('transactionEmit', transaction.id);
            }
          });
        }
      }).render('#paypal-button-container');
    </script>
@endpush