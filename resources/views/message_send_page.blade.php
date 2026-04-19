@extends('layouts.main')


@section('content')
<main>
  <div class="">
        <section>
            <div class="container" style="padding: 50px 0;">
                <div>
                    <h1 class="mb-20">Sınav Giriş Bilgileri Gönderme Sayfası</h1>
                </div>
                <div>
                    <form action="">
                        @csrf
                        <div class="mb-20">
                            <label for="phone_number" class="form-label">Telefon Numarası:</label>
                            <input type="text" class="form-control" id="phone_number" name="phone_number" value="90">
                        </div>
                        <br>
                        <button type="submit" class="btn btn-primary">Mesaj Gönder</button>

                    </form>
                    <div class="form-response">
                        
                    </div>
                </div>
            </div>
        </section>
        
    </div>
</main>

@endsection

@section('scripts')
<script>
    // Form submit event listener
    document.querySelector('form').addEventListener('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        // Get form data
        var formData = new FormData(this);

        // Send AJAX request
        fetch('/send-test-message', {
            method: 'POST',
            body: formData
        })
        .then(response => response.text())
        .then(data => {
            // Handle response from server
            
            document.querySelector('.form-response').innerHTML = '<p>Mesaj gönderildi!</p>';

            // Empty input and set value as "90"
            document.getElementById('phone_number').value = '90';

        })
        .catch(error => {
            // Handle error
            console.error('Error:', error);
        });
    });
</script>
@endsection


