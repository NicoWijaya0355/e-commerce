<!DOCTYPE html>
<html>
<head>
    @include('admin.css')

    <style type="text/css">
        body {
            background-color: #121212; /* Dark background */
            font-family: Arial, sans-serif;
            color: #ffffff; /* Light text */
        }

        .page-content {
            padding: 20px;
            border-radius: 8px;
            background-color: #1e1e1e; /* Darker background for the form */
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        h2 {
            margin-bottom: 20px;
            color: #bb86fc; /* Light purple for headings */
        }

        .div_deg {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
            gap: 15px; /* Space between form elements */
        }

        label {
            display: inline-block;
            font-size: 18px;
            color: #e0e0e0; /* Light gray for labels */
            margin-bottom: 5px;
        }

        input[type="text"], textarea {
            width: 100%; /* Full width for input fields */
            max-width: 400px; /* Limit maximum width */
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #bb86fc; /* Light purple border */
            border-radius: 4px; /* Slightly rounded corners */
            background-color: #333; /* Dark background for inputs */
            color: #ffffff; /* Light text in input fields */
            font-size: 14px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus, textarea:focus {
            border-color: #6200ee; /* Brighter purple border on focus */
            outline: none; /* Remove outline */
        }

        textarea {
            height: 100px; /* Maintain height for textarea */
        }

        .btn {
            padding: 10px 15px;
            background-color: #bb86fc; /* Light purple button */
            color: white;
            border: none;
            border-radius: 4px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .btn:hover {
            background-color: #6200ee; /* Darker purple on hover */
        }

        .btn:active {
            background-color: #3700b3; /* Even darker on click */
        }
    </style>
</head>
<body>
    @include('admin.header')
    @include('admin.sidebar')

    <div class="page-content">
        <h2>Send Email to {{$message->name}}</h2>

        <div class="div_deg">
            <form action="{{ url('send_response', $message->id) }}" method="POST">
                @csrf

                <div>
                    <label for="greeting">Greeting</label>
                    <input type="text" id="greeting" name="greeting" required>
                </div>

                <div>
                    <label for="body">Main Body</label>
                    <textarea id="body" name="body" required></textarea>
                </div>

                <div>
                    <label for="action_text">Action Text</label>
                    <input type="text" id="action_text" name="action_text" required>
                </div>

                <div>
                    <label for="endline">End Line</label>
                    <input type="text" id="endline" name="endline" required>
                </div>

                <div>
                    <input class="btn" type="submit" value="Send Response">
                </div>
            </form>
        </div>
    </div>

    @include('admin.js')
</body>
</html>
