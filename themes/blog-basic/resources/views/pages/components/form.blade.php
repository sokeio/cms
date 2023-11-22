<main class="main pt-4">
    <div class="container">

      <article class="card card-outline mb-4">
        <div class="card-body">
          <header>
            <h4 class="card-title">Form controls</h4>
          </header>
          <form>
            <div class="mb-3">
              <label for="exampleFormInput" class="form-label">Input</label>
              <input type="text" class="form-control" id="exampleFormInput">
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect1" class="form-label">Select</label>
              <select class="form-select" id="exampleFormControlSelect1">
                <option selected>Open this select menu</option>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlSelect2" class="form-label">Multiple</label>
              <select class="form-select" id="exampleFormControlSelect2" multiple>
                <option value="1">One</option>
                <option value="2">Two</option>
                <option value="3">Three</option>
                <option value="4">Four</option>
              </select>
            </div>
            <div class="mb-3">
              <label for="exampleFormControlTextarea1" class="form-label">Textarea</label>
              <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
            </div>
            
            <div class="mb-3">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="one" id="flexCheckDefault">
                <label class="form-check-label" for="flexCheckDefault">
                  Default checkbox
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="two" id="flexCheckChecked" checked>
                <label class="form-check-label" for="flexCheckChecked">
                  Checked checkbox
                </label>
              </div>

              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                <label class="form-check-label" for="flexRadioDefault1">
                  Default radio
                </label>
              </div>
              <div class="form-check">
                <input class="form-check-input" type="radio" name="flexRadioDefault" id="flexRadioDefault2" checked>
                <label class="form-check-label" for="flexRadioDefault2">
                  Default checked radio
                </label>
              </div>
            </div>

            <div class="mb-3">
              <label for="formFile" class="form-label">File input</label>
              <input class="form-control" type="file" id="formFile">
            </div>
          </form>
        </div>
      </article><!-- /.card -->

      <article class="card card-outline mb-4">
        <div class="card-body">
          <header>
            <h4 class="card-title">Sizing</h4>
          </header>

          <input class="mb-2 form-control form-control-lg" type="text" placeholder="Small input">
          <input class="mb-2 form-control" type="text" placeholder="Default input">
          <input class="mb-2 form-control form-control-sm" type="text" placeholder="Large input">

          <select class="mb-2 form-select form-select-lg">
            <option selected>Large select</option>
          </select>
          <select class="mb-2 form-select">
            <option selected>Default select</option>
          </select>
          <select class="mb-2 form-select form-select-sm">
            <option selected>Small select</option>
          </select>
        </div>
      </article><!-- /.card -->

      <article class="card card-outline mb-4">
        <div class="card-body">
          <header>
            <h4 class="card-title">Form grid</h4>
          </header>
          <form>
            <div class="row">
              <div class="mb-3 col-md-6">
                <label class="form-label" for="inputEmail4">Email</label>
                <input type="email" class="form-control" id="inputEmail4" placeholder="Email">
              </div>
              <div class="mb-3 col-md-6">
                <label class="form-label" for="inputPassword4">Password</label>
                <input type="password" class="form-control" id="inputPassword4" placeholder="Password">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" for="inputAddress">Address</label>
              <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
            </div>
            <div class="mb-3">
              <label class="form-label" for="inputAddress2">Address 2</label>
              <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
            </div>
            <div class="row">
              <div class="mb-3 col-md-6">
                <label class="form-label" for="inputCity">City</label>
                <input type="text" class="form-control" id="inputCity">
              </div>
              <div class="mb-3 col-md-4">
                <label class="form-label" for="inputState">State</label>
                <select id="inputState" class="form-control">
                  <option selected>Choose...</option>
                  <option>...</option>
                </select>
              </div>
              <div class="mb-3 col-md-2">
                <label class="form-label" for="inputZip">Zip</label>
                <input type="text" class="form-control" id="inputZip">
              </div>
            </div>
            <div class="mb-3">
              <label class="form-label" class="form-check m-0">
                <input type="checkbox" class="form-check-input">
                <span class="form-check-label">Check me out</span>
              </label>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </article><!-- /.card -->

      <article class="card card-outline mb-4">
        <div class="card-body">
          <header>
            <h4 class="card-title">Horizontal form</h4>
          </header>
          <form>
            <div class="mb-3 row">
              <label class="col-form-label col-sm-2 text-sm-end">Email</label>
              <div class="col-sm-10">
                <input type="email" class="form-control" placeholder="Email">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-form-label col-sm-2 text-sm-end">Password</label>
              <div class="col-sm-10">
                <input type="password" class="form-control" placeholder="Password">
              </div>
            </div>
            <div class="mb-3 row">
              <label class="col-form-label col-sm-2 text-sm-end">Textarea</label>
              <div class="col-sm-10">
                <textarea class="form-control" placeholder="Textarea" rows="3"></textarea>
              </div>
            </div>
            <fieldset class="mb-3">
              <div class="row">
                <label class="col-form-label col-sm-2 text-sm-end pt-sm-0">Radios</label>
                <div class="col-sm-10">
                  <label class="form-check">
                    <input name="radio-3" type="radio" class="form-check-input" checked>
                    <span class="form-check-label">Default radio</span>
                  </label>
                  <label class="form-check">
                    <input name="radio-3" type="radio" class="form-check-input">
                    <span class="form-check-label">Second default radio</span>
                  </label>
                  <label class="form-check">
                    <input name="radio-3" type="radio" class="form-check-input" disabled>
                    <span class="form-check-label">Disabled radio</span>
                  </label>
                </div>
              </div>
            </fieldset>
            <div class="mb-3 row">
              <label class="col-form-label col-sm-2 text-sm-end pt-sm-0">Checkbox</label>
              <div class="col-sm-10">
                <label class="form-check m-0">
                  <input type="checkbox" class="form-check-input">
                  <span class="form-check-label">Check me out</span>
                </label>
              </div>
            </div>
            <div class="mb-3 row">
              <div class="col-sm-10 ms-sm-auto">
                <button type="submit" class="btn btn-primary">Submit</button>
              </div>
            </div>
          </form>
        </div>
      </article><!-- /.card -->

      <article class="card card-outline mb-4">
        <div class="card-body">
          <header>
            <h4 class="card-title">Form validation</h4>
          </header>
          <form class="row g-3 needs-validation" novalidate>
            <div class="col-md-4">
              <label for="validationCustom01" class="form-label">First name</label>
              <input type="text" class="form-control" id="validationCustom01" value="Mark" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustom02" class="form-label">Last name</label>
              <input type="text" class="form-control" id="validationCustom02" value="Otto" required>
              <div class="valid-feedback">
                Looks good!
              </div>
            </div>
            <div class="col-md-4">
              <label for="validationCustomUsername" class="form-label">Username</label>
              <div class="input-group">
                <span class="input-group-text" id="inputGroupPrepend">@</span>
                <input type="text" class="form-control" id="validationCustomUsername" aria-describedby="inputGroupPrepend"
                  required>
                <div class="invalid-feedback">
                  Please choose a username.
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <label for="validationCustom03" class="form-label">City</label>
              <input type="text" class="form-control" id="validationCustom03" required>
              <div class="invalid-feedback">
                Please provide a valid city.
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom04" class="form-label">State</label>
              <select class="form-select" id="validationCustom04" required>
                <option selected disabled value="">Choose...</option>
                <option>...</option>
              </select>
              <div class="invalid-feedback">
                Please select a valid state.
              </div>
            </div>
            <div class="col-md-3">
              <label for="validationCustom05" class="form-label">Zip</label>
              <input type="text" class="form-control" id="validationCustom05" required>
              <div class="invalid-feedback">
                Please provide a valid zip.
              </div>
            </div>
            <div class="col-12">
              <div class="form-check">
                <input class="form-check-input" type="checkbox" value="" id="invalidCheck" required>
                <label class="form-check-label" for="invalidCheck">
                  Agree to terms and conditions
                </label>
                <div class="invalid-feedback">
                  You must agree before submitting.
                </div>
              </div>
            </div>
            <div class="col-12">
              <button class="btn btn-primary" type="submit">Submit form</button>
            </div>
          </form>
        </div>
      </article><!-- /.card -->

    </div>
  </main>