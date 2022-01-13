<script src="{{ $web_source }}/js/vendor/jquery-library.js"></script>
<script src="{{ $web_source }}/js/vendor/bootstrap.min.js"></script>
<script
src="http://maps.google.com/maps/api/js?key=AIzaSyCR-KEWAVCn52mSdeVeTqZjtqbmVJyfSus&amp;language=en">
</script>
<script src="{{ $web_source }}/JS/responsivethumbnailgallery.html"></script>
<script src="{{ $web_source }}/js/jquery.flagstrap.min.js"></script>
<script src="{{ $web_source }}/js/backgroundstretch.js"></script>
<script src="{{ $web_source }}/js/owl.carousel.min.js"></script>
<script src="{{ $web_source }}/js/jquery.vide.min.js"></script>
<script src="{{ $web_source }}/js/jquery.collapse.js"></script>
<script src="{{ $web_source }}/js/scrollbar.min.js"></script>
<script src="{{ $web_source }}/JS/chartist.min.html"></script>
<script src="{{ $web_source }}/js/prettyPhoto.js"></script>
<script src="{{ $web_source }}/js/jquery-ui.js"></script>
<script src="{{ $web_source }}/js/countTo.js"></script>
<script src="{{ $web_source }}/js/appear.js"></script>
<script src="{{ $web_source }}/js/gmap3.js"></script>
<script src="{{ $web_source }}/js/main.js"></script>


<!-- suneditor -->
<script src="{{ $web_source }}/js/suneditor/js/common.js"></script>
<script src="{{ $web_source }}/js/suneditor/js/suneditor.min.js"></script>
<!-- codeMirror -->
<script src="{{ $web_source }}/js/suneditor/js/codemirror.min.js"></script>
<script src="{{ $web_source }}/js/suneditor/js/htmlmixed.js"></script>
<script src="{{ $web_source }}/js/suneditor/js/xml.js"></script>
<script src="{{ $web_source }}/js/suneditor/js/css.js"></script>
<!-- KaTeX -->
<script src="{{ $web_source }}/js/suneditor/js/katex.min.js"></script>
<script src="{{ $web_source }}/js/suneditor/js/suneditor-init.js"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
@yield('script')
<script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')
        }
    });

    function fillCountries(target) {
        const defaultValue = $(target).attr("data-value");
        let selectedIndex = null;
        $.ajax({
            type: "get",
            url: "{{ route('api.location.countries') }}",
            data: {},
            dataType: 'json',
            success: function(data) {
                let options = ["<option disabled selected >Select Option</option>"];
                data.data.forEach((value, index) => {
                    let isSeleted = (defaultValue == value.id) ? "selected" : "";
                    if(isSeleted){
                        selectedIndex = index
                    }
                    options.push("<option value='" + value.id + "' "+isSeleted+">" + value.name + "</option>");
                })
                $(target).html(options)
                if(selectedIndex != null){
                    $(target).trigger("change");
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function fillStates(target, countryId = null) {
        const defaultValue = $(target).attr("data-value");
        let selectedIndex = null;
        $.ajax({
            type: "get",
            url: "{{ route('api.location.states') }}",
            data: {
                "country_id": countryId
            },
            dataType: 'json',
            success: function(data) {
                let options = ["<option disabled selected >Select Option</option>"];
                data.data.forEach((value, index) => {
                    let isSeleted = (defaultValue == value.id) ? "selected" : "";
                    if(isSeleted){
                        selectedIndex = index
                    }
                    options.push("<option value='" + value.id + "' "+isSeleted+">" + value.name + "</option>");
                })
                $(target).html(options)
                if(selectedIndex != null){
                    $(target).trigger("change");
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function fillCities(target, stateId = null) {
        const defaultValue = $(target).attr("data-value");
        let selectedIndex = null;
        $.ajax({
            type: "get",
            url: "{{ route('api.location.cities') }}",
            data: {
                "state_id": stateId
            },
            dataType: 'json',
            success: function(data) {
                let options = ["<option disabled selected >Select Option</option>"];
                data.data.forEach((value, index) => {
                    let isSeleted = (defaultValue == value.id) ? "selected" : "";
                    if(isSeleted){
                        selectedIndex = index
                    }
                    options.push("<option value='" + value.id + "' "+isSeleted+">" + value.name + "</option>");
                })
                $(target).html(options)
                if(selectedIndex != null){
                    $(target).trigger("change");
                }
            },
            error: function(error) {
                console.log(error);
            }
        });
    }

    function slugify(value = "", search = " ", replaceWith = "-") {
        return value.replaceAll(search, replaceWith)
    }

    function unSlugify(value = "", search = "-", replaceWith = " ") {
        return value.replaceAll(search, replaceWith)
    }


    function copyToClipboard(value) {
        navigator.clipboard.writeText(value)
            .then(() => {
                toastr.success("Copied to clipboard!")
            })
            .catch((error) => {
                toastr.error("Failed to copy")
            });
    }

    $(".copy").on("click" , function(){
        const value = $(this).attr("data-content");
        if(value){
            return copyToClipboard(value);
        }
    })
</script>
