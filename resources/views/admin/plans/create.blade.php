@extends("dashboards.admin.layouts.app")
@section('content')
    <div id="tableCheckbox" class="">
        <div class="statbox widget box box-shadow mt-5">
            <div class="widget-header">
                <div class="row">
                    <div class="col-xl-12 col-md-12 col-sm-12 col-12">
                        <h4> Create  </h4>
                    </div>
                </div>
            </div>
            <div class="widget-content widget-content-area">

               

                    <div class="form-row mb-3">

                        <div class="form-group col-md-3">
                            <label for="">Name <span class="required">*</span></label>
                            <input class="form-control" type="text" required name="name" placeholder="Pro..."
                                value="">
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">Price ($) <span class="required">*</span></label>
                            <input class="form-control" type="number" required name="price" placeholder="In dollars"
                                value="">
                        </div>

                        <div class="form-group col-md-3">
                            <label for="">Duration (days)<span class="required">*</span></label>
                            <input class="form-control" type="number" required name="duration" placeholder="In days "
                                value="">
                        </div>


                        <div class="form-group col-md-3">
                            <label for="">Is Published <span class="required">*</span></label>
                            <select name="is_active" class="form-control" id="" required>
                                <option value="" disabled selected>Select Option</option>
                               
                              
                            </select>
                        </div>
                    </div>
              
                    <button  type="submit" class="btn btn-success mt-3">
                        Submit
                    </button>
                </form>

            </div>
        </div>
    </div>
@endsection
