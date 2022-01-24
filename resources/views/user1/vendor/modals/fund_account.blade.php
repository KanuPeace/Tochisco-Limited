<div class="modal fade" id="fundAccount" tabindex="-1" role="dialog" aria-labelledby="fundAccount" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <form action="{{ route('user.vendor.manual_payment') }}" method="POST"> @csrf
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Fund Vendor Account</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="mb-2">
                        To fund your account, pay into any of the account details below and
                        <b class="text-danger">use the reference code as your transaction reference</b>
                        while making payment.
                    </div>

                    <div class="alert alert-danger mb-4">
                        Reference Code: <b>{{ $vendor->payment_ref }}</b>
                        <a href="javascript:;;" class="text-primary ml-2"
                            onclick="return copyToClipboard({{ $vendor->payment_ref }})">
                            <i class="fas fa-copy"></i>
                            copy
                        </a>
                    </div>
                    {{-- <p>
                        Acct Name: Nnanna Emmanuel Chinwike <br>
                        Acct No.: 0060318838 <br>
                        Bank Name: Access Bank <br>
                    </p> --}}
                    {{-- <p>
                        Acct Name: Nnanna Emmanuel Chinwike <br>
                        Acct No.: 2369795719 <br>
                        Bank Name: Zenith Bank <br>
                    </p> --}}
                    <p>
                        <b>Acct Name:</b> <a href="javascript:;;" class="text-primary ml-2"
                            onclick="return copyToClipboard('FLAIRWORLDS TECHNOLOGY')">FLAIRWORLDS TECHNOLOGY</a>
                        <br />
                        <b>Acct No.:</b>  <a href="javascript:;;" class="text-primary ml-2"
                        onclick="return copyToClipboard('7817285703')">7817285703 </a> <br />
                        <b>Bank Name:</b>  <a href="javascript:;;" class="text-primary ml-2"
                        onclick="return copyToClipboard('WEMA BANK')"> WEMA BANK.</a> <br />
                    </p>

                    <p class="mt-4 mb-4 text-success">
                        After successful payment , kindly click on the "I have paid" button below
                    </p>
                    <p class="text-danger"><b>Note the the minimum deposit amount is NGN {{number_format($min_deposit)}}</b></p>

                    <div class="form-group">
                        <label for="">Amount(NGN)</label>
                        <input type="number" step="any" min="{{$min_deposit}}" name="amount" id="" placeholder="How much did you pay in Naira?" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button class="btn btn-lg " data-dismiss="modal"><i class="flaticon-cancel-12"></i> Discard</button>
                    <button type="submit" class="btn btn-success btn-lg">I have paid</button>
                </div>
            </form>
        </div>
    </div>
</div>
