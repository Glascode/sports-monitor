<div class="m-auto p-5"
     style="max-width: 400px; border: 1px solid lightgray; border-radius: .5rem;">
    <h1 class="text-center mb-4">Select your team</h1>

    <form method="POST"> <!-- form -->
        <div class="form-group mb-4">
            <select class="custom-select" name="team" required>
                <option value disabled selected>
                    Choose your favourite team
                </option>
                <option value="smc">SM Caen</option>
            </select>
        </div>
        <div class="form-group d-flex justify-content-between">
            <a class="btn btn-primary d-block" href="/login"
               style="margin-left: -1rem;">Back</a>
            <button class="btn btn-primary btn-raised d-block" type="submit">
                Next
            </button>
        </div>
    </form>
</div>