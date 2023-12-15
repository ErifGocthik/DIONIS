// (function getusers() {
//     $(document).ready(function () {
//         let page = document.URL.split('/dionis/')[1];
//         let site = page.split('/')[0];
//         if (site === 'web') {
//             setInterval(function () {
//                 $.ajax({
//                     url: '/dionis/web/site/send',
//                     type: 'GET',
//                     dataType: 'json',
//                     success: function (response) {
//                         if (response.change)
//                         {
//                             $('.window').append(`<div class="message sender"><p>response.content</p></div>`)
//                         }
//                     },
//                 });
//             }, 20000)
//             $('.send-mes').on('click', function (e)
//             {
//                 e.preventDefault();
//                 var message = $('#message-message').val();
//                 let message_block = `<div class="message sender"><p>${message}</p></div>`;
//                 $('.window').append(message_block);
//                 $('#message-message').val('');
//                 var token = $('meta[name="csrf-token"]').attr("content");
//                 $.ajax({
//                     url: '/dionis/web/site/send',
//                     type: 'POST',
//                     data: {
//                         'message': message,
//                         '_csrf': token,
//                     },
//                     dataType: 'json',
//                     });
//             });
//         }
//     })
// })();