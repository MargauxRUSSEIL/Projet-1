<template>
  <div id="app">
    <h1>Accessible expand and collapse</h1>

    <div class="expandCollapse">
      <section>
        <h2>First Header</h2>

        <p class="panel">
          blablabla
        </p>
      </section>

      <section>
        <h2>Second Header</h2>

        <ol class="panel">
          <li>List item 1</li>
          <li>List item 2</li>
          <li>List item 3</li>
          <li>List item 4</li>
          <li>List item 5</li>
        </ol>
      </section>

      <section>
        <h2>Third Header</h2>

        <ol class="panel">
          <li>List item 1</li>
          <li>List item 2</li>
          <li>List item 3</li>
          <li>List item 4</li>
          <li>List item 5</li>
        </ol>
      </section>

    </div>

  </div>
</template>

<script>
  export default {
    name: "app",
    mounted() {
      this.expandCollapse()
    },
    methods: {
      expandCollapse() {
        var theHeaders = document.querySelectorAll('.expandCollapse h2'),
          i;

        for (i = 0; i < theHeaders.length; i++) {

          var thisEl = theHeaders[i],
            theId = 'panel-' + i;

          var thisTarget = thisEl.parentNode.querySelector('.panel');

          if (!thisTarget) {
            continue;
          }

          // Create the button
          thisEl.innerHTML = '<button aria-expanded="false" aria-controls="' + theId + '">' + thisEl.textContent +
            '</button>';

          // Create the expandable and collapsible list and make it focusable
          thisTarget.setAttribute('id', theId);
          thisTarget.setAttribute('hidden', 'true');
        }

        // Make it click
        var theButtons = document.querySelectorAll('.expandCollapse button[aria-expanded][aria-controls]');

        for (i = 0; i < theButtons.length; i++) {

          // theButtons[i].addEventListener('mouseover', function (e) {
          //   var thisButton = e.target;
          //   var state = thisButton.getAttribute('aria-expanded') === 'false' ? true : false;

          //   thisButton.setAttribute('aria-expanded', state);

          //   document.getElementById(thisButton.getAttribute('aria-controls')).toggleAttribute('hidden', !state);

          // });
          theButtons[i].addEventListener('click', function (e) {
            var thisButton = e.target;
            var state = thisButton.getAttribute('aria-expanded') === 'false' ? true : false;

            thisButton.setAttribute('aria-expanded', state);

            document.getElementById(thisButton.getAttribute('aria-controls')).toggleAttribute('hidden', !state);

          });
          // theButtons[i].addEventListener('mouseleave', function (e) {
          //   var thisButton = e.target;
          //   var state = thisButton.getAttribute('aria-expanded') === 'true' ? false : true;

          //   thisButton.setAttribute('aria-expanded', state);

          //   document.getElementById(thisButton.getAttribute('aria-controls')).toggleAttribute('hidden', !state);

          // });
        }
      }
    }
  };
</script>

<style lang="postcss">
  .expandCollapse {
    display: flex
  }

  [aria-hidden="true"] {
    //display: none;
  }

  button {
    background-color: transparent;
    border: none;
    cursor: pointer;
    font-size: 1em;
    outline: none;
  }

  .panel {
    position: absolute;

  }

  /* button:focus {
    background-color: black;
    color: white;
  } */
</style>