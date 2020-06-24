      <!-- Footer -->
      <footer class="sticky-footer bg-white">
        <div class="container my-auto">
          <div class="copyright text-center my-auto">
            <span>Copyright &copy; ABY-TECH <?php echo date('Y'); ?></span>
          </div>
        </div>
      </footer>
      <!-- End of Footer -->
      </div>
        <!-- /.container-fluid -->
      </div>
      <!-- End of Main Content -->
    </div>
    <!-- End of Content Wrapper -->
<!--<style type="text/css">
  /* custom properties (AKA css variables) */
.si {
  --color-label: #9aa6bf;
  --color-default: #dee5f2;
  --color-active: #0069ff;
  --rotate-default: 180deg;
  --rotate-active: 40deg;
  --border-size-checkmark: 2px;
  --border-size-box: 1px;
  --input-size: 20px;
  --guter: 15px;
}

/* basic reset */
.si,
.si *,
.si *::before,
.si *::after {
  box-sizing: border-box;
}

/* label */
.si {
  cursor: pointer;
  position: relative;
}

.si .si-label {
  display: inline-block;
  padding-left: var(--guter);
  color: var(--color-label);
  vertical-align: text-top;
}

.si > input { display: none; }

.si > input[type="checkbox"],
.si > input[type="radio"] {
  clip-path: polygon(0 0);
}

/* change property values smoothly */
.si .si-label::before,
.si .si-label::after {
  transition: all 0.2s ease-in-out;
}

/* an element for both checkbox and radio */
.si .si-label::before {
  content: '';
  display: block;
  width: var(--input-size);
  height: var(--input-size);
  border: var(--border-size-box) solid var(--color-default);
  position: absolute;
  top: -3px;
  left: 0;
  transform: rotate(0deg) scale(1);
}

/* feedback when the user interacts with an element */
.si .si-label:hover::before {
  border-color: var(--color-active);
}

/* checkbox square */
.si.si-checkbox .si-label::before {
  border-radius: var(--border-size-checkmark);
}

/* checkbox checkmark */
.si.si-checkbox .si-label::after {
  content: '';
  display: block;
  width: 8px;
  height: 18px;
  border-width: 0 var(--border-size-checkmark) var(--border-size-checkmark) 0;
  border-style: solid;
  border-color: transparent var(--color-active) var(--color-active) transparent;
  position: absolute;
  top: -3px;
  left: 0;
  transform: rotate(var(--rotate-default)) scale(0);
}

/* checkbox square */
.si.si-checkbox > input:checked + .si-label::before {
  transform: rotate(var(--rotate-active)) scale(0);
}

/* checkmark */
.si.si-checkbox > input:checked + .si-label::after {
  left: 8px;
  transform: rotate(var(--rotate-active)) scale(1);
}

/* circles, alignment */
.si.si-radio .si-label::before,
.si.si-radio .si-label::after {
  border-radius: 100%;
  top: -2px;
}

/* radio bullet circle */
.si.si-radio .si-label::after {
  content: '';
  display: block;
  position: absolute;
  width: 12px;
  height: 0;
  top: 100%;
  left: 4px;
}

.si.si-radio > input:checked + .si-label::after {
  background-color: #fff;
  height: 12px;
  top: 2px;
}

.si.si-radio > input:checked + .si-label::before {
  background-color:var(--color-active);
}


.si [data-onchecked="show"],
.si > input:checked ~ [data-onchecked="hide"] {
  display: none;
}

.si [data-onchecked="hide"],
.si > input:checked ~ [data-onchecked="show"] {
  display: inline-block;
}

.si > input:checked + .si-label.line-across {
  text-decoration: line-through;
}
</style>
<label for="defaultCheckbox" class="si si-checkbox">
  <input type="checkbox" class="si si-checkbox" id="defaultCheckbox" />
  <span class="si-label"></span>
</label>

<label for="checkedCheckbox" class="si si-checkbox">
  <input type="checkbox" id="checkedCheckbox" checked />
  <span class="si-label"></span>
</label>
<label for="defaultRadio" class="si si-radio">
  <input type="radio" id="defaultRadio" name="radioGroup" />
  <span class="si-label"></span>
</label>

<label for="checkedRadio" class="si si-radio">
  <input type="radio" id="checkedRadio" name="radioGroup" checked />
  <span class="si-label">Checked radio state</span>
</label>-->

</body>
</html>