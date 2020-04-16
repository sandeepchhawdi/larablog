<script type="text/javascript">
    $(function() {
        // Image Uploader
        $('#post_image_trigger').filemanager('image');

        // CKEditor RTE
        CKEDITOR.replace('content', CKEDITOR_OPTIONS);

        // Date Picker
        $("#publish_date").pickadate({
            format: "mmm-d-yyyy"
        });

        // Time Picker
        $("#publish_time").pickatime({
            format: "h:i A"
        });

        // Tags
        $("#tags").selectize({
            create: true
        });
        
        $("#parent_category").on('change', function (e) {
            var categoryId = $(this).val();
            var selectedSubcategories = {{ json_encode($sub_categories_ids) }};
            console.log(selectedSubcategories);
            var url = "{{ url('/') }}" + "/admin/category/subcategories/" + categoryId;
            $.get(url, function(data, status) {
                console.log(typeof(data));
                var options = [];
                Object.keys(data).forEach (function(key) {
                    options.push({value: key, text: data[key]});
                });    
                $("#subcategories").selectize()[0].selectize.clear();
                $("#subcategories").selectize()[0].selectize.clearOptions();
                $("#subcategories").selectize()[0].selectize.addOption(options);
                $("#subcategories").selectize()[0].selectize.refreshOptions();
                $("#subcategories").selectize()[0].selectize.setValue(selectedSubcategories);
            });
        });
        
        // subcategories
        $("#subcategories").selectize();

        $('.loading').hide();
        $('.blog-post-form').fadeIn(100);
    });
</script>
