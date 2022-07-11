<!-- website main -->
<div id="main">
   <?php if ( isset($icon) ):?>

      <!-- icon form -->
      <div id="icon-form">
         <div class="row container">
            <div class="col6">
               <div>
                  <canvas id="ig-preview-canvas"></canvas>
               </div>
            </div>
            <div class="col6">
               <div>
                  <span id="ig-background-settings">Настройки фона</span>
                  <div>
                     <div>
                        <label for="ig-background-shape" data-value="<?php echo $website['icon-background-shape'];?>">Фигура:</label>
                        <select id="ig-background-shape">
                           <option value="circle"  <?php echo ($website['icon-background-shape'] == 'circle'  ? 'selected' : '');?>>Круг</option>
                           <option value="square"  <?php echo ($website['icon-background-shape'] == 'square'  ? 'selected' : '');?>>Квадрат</option>
                           <option value="diamond" <?php echo ($website['icon-background-shape'] == 'diamond' ? 'selected' : '');?>>Ромб</option>
                           <option value="hexagon" <?php echo ($website['icon-background-shape'] == 'hexagon' ? 'selected' : '');?>>Шестиугольник</option>
                           <option value="octagon" <?php echo ($website['icon-background-shape'] == 'octagon' ? 'selected' : '');?>>Восьмиугольник</option>
                           <option value="decagon" <?php echo ($website['icon-background-shape'] == 'decagon' ? 'selected' : '');?>>Десятиугольник</option>
                        </select>
                     </div>
                     <div style="display:none;">
                        <label for="ig-background-dimensions" data-value="<?php echo $website['icon-background-dimensions'];?>px">Размер:</label>
                        <input id="ig-background-dimensions" type="range" min="<?php echo $website['icon-min-dimensions'];?>" max="<?php echo $website['icon-max-dimensions'];?>" step="1" value="<?php echo $website['icon-background-dimensions'];?>" />
                     </div>
                     <div>
                        <label for="ig-background-opacity" data-value="<?php echo $website['icon-background-opacity'];?>">Прозрачность:</label>
                        <input id="ig-background-opacity" type="range" min="0" max="1" step="0.1" value="<?php echo $website['icon-background-opacity'];?>" />
                     </div>
                     <div>
                        <label for="ig-background-color" data-value="<?php echo $website['icon-background-color'];?>">Цвет:</label>
                        <input id="ig-background-color" type="text" placeholder="e.g: #2E8ECE" value="<?php echo $website['icon-background-color'];?>" />
                     </div>
                  </div>
               </div>
               <div>
                  <span id="ig-icon-settings">Настройки иконки</span>
                  <div>
                     <div>
                        <label for="ig-icon-size" data-value="<?php echo $website['icon-size'];?>%">Размер:</label>
                        <input id="ig-icon-size" type="range" min="5" max="100" step="1" value="<?php echo $website['icon-size'];?>" />
                     </div>
                     <div>
                        <label for="ig-icon-opacity" data-value="<?php echo $website['icon-opacity'];?>">Прозрачность:</label>
                        <input id="ig-icon-opacity" type="range" min="0" max="1" step="0.1" value="<?php echo $website['icon-opacity'];?>" />
                     </div>
                     <div>
                        <label for="ig-icon-color" data-value="<?php echo $website['icon-color'];?>">Цвет:</label>
                        <input id="ig-icon-color" type="text" placeholder="e.g: #FFFFFF" value="<?php echo $website['icon-color'];?>" />
                     </div>
                  </div>
               </div>
               <div>
                  <span id="ig-shadow-settings">Настройка тени</span>
                  <div>
                     <div>
                        <label for="ig-shadow-depth" data-value="<?php echo $website['icon-shadow-depth'];?>%">Глубина:</label>
                        <input id="ig-shadow-depth" type="range" min="0" max="100" step="1" value="<?php echo $website['icon-shadow-depth'];?>" />
                     </div>
                     <div>
                        <label for="ig-shadow-angle" data-value="<?php echo $website['icon-shadow-angle'];?>°">Угол:</label>
                        <input id="ig-shadow-angle" type="range" min="0" max="360" step="1" value="<?php echo $website['icon-shadow-angle'];?>" />
                     </div>
                     <div>
                        <label for="ig-shadow-opacity" data-value="<?php echo $website['icon-shadow-opacity'];?>">Прозрачность:</label>
                        <input id="ig-shadow-opacity" type="range" min="0" max="1" step="0.1" value="<?php echo $website['icon-shadow-opacity'];?>" />
                     </div>
                     <div>
                        <label for="ig-shadow-color" data-value="<?php echo $website['icon-shadow-color'];?>">Цвет:</label>
                        <input id="ig-shadow-color" type="text" placeholder="e.g: #000000" value="<?php echo $website['icon-shadow-color'];?>" />
                     </div>
                  </div>
               </div>
               <div>
                  <span id="ig-border-settings">Настройки границы</span>
                  <div>
                     <div>
                        <label for="ig-border-size" data-value="<?php echo $website['icon-border-size'];?>%">Размер:</label>
                        <input id="ig-border-size" type="range" min="0" max="50" step="1" value="<?php echo $website['icon-border-size'];?>" />
                     </div>
                     <div>
                        <label for="ig-border-opacity" data-value="<?php echo $website['icon-border-opacity'];?>">Прозрачность:</label>
                        <input id="ig-border-opacity" type="range" min="0" max="1" step="0.1" value="<?php echo $website['icon-border-opacity'];?>" />
                     </div>
                     <div>
                        <label for="ig-border-color" data-value="<?php echo $website['icon-border-color'];?>">Цвет:</label>
                        <input id="ig-border-color" type="text" placeholder="e.g: #FFFFFF" value="<?php echo $website['icon-border-color'];?>" />
                     </div>
                  </div>
               </div>
               <div>
                  <button id="ig-reset-button"><i class="fa fa-refresh"></i> Сброс</button>
                  <button id="ig-download-button"><i class="fa fa-download"></i> Скачать</button>
               </div>
            </div>
         </div>
      </div>

      <!-- more icons -->
      <div id="icon-list">
         <div class="row container">
            <div class="col12">
               <h2>Другие иконки</h2>
               <p>Вот еще несколько иконок, которые вы можете использовать.</p>
            </div>
            <?php foreach( $website['more'] as $value ):?>
               <div class="col2">
                  <a href="<?php echo $website['icons'][$value]['url'];?>" title="<?php echo $website['icons'][$value]['name'];?> icon">
                     <span><?php echo $website['icons'][$value]['name'];?></span>
                     <i class="fa fa-<?php echo $website['icons'][$value]['class'];?>" data-icon="<?php echo $website['icons'][$value]['icon'];?>"></i>
                  </a>
               </div>
            <?php endforeach;?>
         </div>
      </div>

   <?php else:?>

      <!-- icon sort -->
      <div id="sort-options">
         <div class="vertical-align row container">
            <div class="col8">
               <input id="ig-sort-by-term" type="text" placeholder="Поиск иконок" />
            </div>
            <div class="col1">
               <i id="ig-sort-by-names" class="fa fa-sort-alpha-asc" title="Сортировка по названию"></i>
            </div>
            <div class="col1">
               <i id="ig-sort-by-views" class="fa fa-globe" title="Сортировка по просмотрам"></i>
            </div>
            <div class="col1">
               <i id="ig-sort-by-downloads" class="fa fa-download" title="Сортировка по скачиваниям"></i>
            </div>
            <div class="col1">
               <i id="ig-sort-by-popular" class="fa fa-heart" title="Сортировка по популярности"></i>
            </div>
         </div>
      </div>

      <!-- icon list -->
      <div id="icon-list">
         <div id="ig-icons-parent" class="row container">
            <?php foreach( $website['icons'] as $value ):?>
               <div class="col2" data-json="<?php echo htmlspecialchars(json_encode($value));?>">
                  <a href="<?php echo $value['url'];?>" title="<?php echo $value['name'];?> icon">
                     <span><?php echo $value['name'];?></span>
                     <i class="fa fa-<?php echo $value['class'];?>" data-icon="<?php echo $value['icon'];?>"></i>
                  </a>
               </div>
            <?php endforeach;?>
         </div>
      </div>

   <?php endif;?>
</div>