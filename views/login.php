<div class="d-flex justify-content-center align-items-center text-white vh-100" 
style="background: url('/assets/images/logo4.png') no-repeat center center/cover;">
    <div class="container bg-secondary rounded shadow" style="max-width: 400px; padding: 2rem; --bs-bg-opacity: .7;">
        <!-- Login Card -->
        <div class="text-center mb-4">
            <h1 class="fw-bold">Welcome to ProSync.</h1>
            <p class="text-muted">Login to manage your expenses</p>
        </div>
        <form action="/login" method="post">
            <!-- Username -->
            <div class="mb-3">
                <input type="text" class="form-control" name="username" id="username" placeholder="Username" required>
            </div>
            <!-- Password -->
            <div class="mb-3">
                <input type="password" class="form-control" name="password" id="password" placeholder="Password" required>
            </div>
            <!-- Login Button -->
            <div class="d-grid">
                <button class="btn btn-primary w-100">Login</button>
            </div>
        </form>
        <!-- Signup Link -->
        <hr class="my-4">
        <div class="text-center">
            <p class="text-muted">Don't have an account? <a href="/signup" class="text-white fw-bold">Sign up</a></p>
        </div>
    </div>
    </div>
