(function set_place() {
    let page = document.URL.split('/dionis/web/site/')[1];
    let page_id = page.split('?id=')[0];
    if(page_id === 'buyticket') {
        $(document).ready(function () {
            let places_array = [];
            let places_id_array = [];
            let link_id = document.URL.split('=')[1];

            function remove(arr, val) {
                index = arr.indexOf(val);
                arr.splice(index, 1);
            }

            $('.place').click(function (e) {
                let place_id = e.target.className.split('_')[2];
                let val = `${$('.place_id_' + place_id).html()}`;
                if (!places_array.includes(val)) {
                    if (places_array.length < 10) {
                        places_id_array.push(place_id);
                        places_array.push(val);
                        $(`.place_id_${place_id}`).css({'filter': 'hue-rotate(90deg)'});
                        $('.places-selected').html(`${places_array} `);
                    } else {
                        alert('Вы не можете выбрать больше 10 мест на 1 билет');
                    }
                } else {
                    remove(places_id_array, place_id);
                    remove(places_array, val);
                    $(`.place_id_${place_id}`).css({'filter': 'hue-rotate(0deg)'});
                    $('.places-selected').html(`${places_array} `);
                }


            });
            $('.btn-post').click(function (e) {
                e.preventDefault();
                if (places_array.length != 0) {
                    var param = $('meta[name="csrf-param"]').attr("content");
                    var token = $('meta[name="csrf-token"]').attr("content");
                }
                $.ajax({
                    url: 'setplace?id=' + link_id,
                    type: 'POST',
                    data: {
                        '_csrf': token,
                        'places': places_id_array.toString(),
                        'phone_number': $('#ticket-phone_number').val(),
                    },
                    dataType: 'json',
                    success: function (response) {
                    },
                    error: function (xhr, status, error) {
                    }
                });
            });
        });
    }
})();