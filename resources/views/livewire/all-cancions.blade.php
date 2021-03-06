<div class="flex flex-col items-center justify-center w-full">
    <h4 class="text-xl text-green-900">ESTAS SON LAS CANCIONES QUE HABEIS PROPUESTO</h4>
    <table class="w-full mx-24 mt-2 border border-collapse border-gray-500 table-fixed">
      <thead class="">
        <tr class="border-b-2 border-black">
          <th class="w-1/2 px-2 text-center bg-gray-300">CANCIÓN</th>
          <th class="w-1/2 px-2 text-center bg-gray-300">AUTOR/INTÉRPRETE</th>
          <th class="w-1/2 px-2 text-center bg-gray-300">Estilo</th>
        </tr>
      </thead>
      <tbody class="divide-y divide-gray-400">
          @foreach ($cancions as $cancion)
          <tr class="bg-green-200">
            <td class="px-2 overflow-hidden text-xl text-left uppercase text-ellipsis"> {{ $cancion->title }}</td>
            <td class="px-2 overflow-hidden text-xl uppercase text-ellipsis"> {{ $cancion->author }}</td>
            <td class="px-2 overflow-hidden text-xl uppercase text-ellipsis"> {{ $cancion->style }}</td>
          </tr>
          @endforeach

      </tbody>
    </table>
  </div>

  @push('scripts')
  <script>
    let tablesSongs = document.getElementsByTagName("table");
      for (var i = 0; i < tablesSongs.length; i++) {
        resizableGrid(tablesSongs[i]);
      }
      function resizableGrid(table) {
        var row = table.getElementsByTagName("tr")[0],
          cols = row ? row.children : undefined;
        if (!cols) return;

        table.style.overflow = "hidden";

        var tableHeight = table.offsetHeight;

        for (var i = 0; i < cols.length; i++) {
          var div = createDiv(tableHeight);
          cols[i].appendChild(div);
          cols[i].style.position = "relative";
          setListeners(div);
        }

        function setListeners(div) {
          var pageX, curCol, nxtCol, curColWidth, nxtColWidth;

          div.addEventListener("mousedown", function (e) {
            curCol = e.target.parentElement;
            nxtCol = curCol.nextElementSibling;
            pageX = e.pageX;

            var padding = paddingDiff(curCol);

            curColWidth = curCol.offsetWidth - padding;
            if (nxtCol) nxtColWidth = nxtCol.offsetWidth - padding;
          });

          div.addEventListener("mouseover", function (e) {
            e.target.style.borderRight = "2px solid #0000ff";
          });

          div.addEventListener("mouseout", function (e) {
            e.target.style.borderRight = "";
          });

          document.addEventListener("mousemove", function (e) {
            if (curCol) {
              var diffX = e.pageX - pageX;

              if (nxtCol) nxtCol.style.width = nxtColWidth - diffX + "px";

              curCol.style.width = curColWidth + diffX + "px";
            }
          });

          document.addEventListener("mouseup", function (e) {
            curCol = undefined;
            nxtCol = undefined;
            pageX = undefined;
            nxtColWidth = undefined;
            curColWidth = undefined;
          });
        }

        function createDiv(height) {
          var div = document.createElement("div");
          div.style.top = 0;
          div.style.right = 0;
          div.style.width = "5px";
          div.style.position = "absolute";
          div.style.cursor = "col-resize";
          div.style.userSelect = "none";
          div.style.height = height + "px";
          return div;
        }

        function paddingDiff(col) {
          if (getStyleVal(col, "box-sizing") == "border-box") {
            return 0;
          }

          var padLeft = getStyleVal(col, "padding-left");
          var padRight = getStyleVal(col, "padding-right");
          return parseInt(padLeft) + parseInt(padRight);
        }

        function getStyleVal(elm, css) {
          return window.getComputedStyle(elm, null).getPropertyValue(css);
        }
      }
</script>

  @endpush
