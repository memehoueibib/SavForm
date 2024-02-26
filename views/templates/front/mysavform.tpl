{extends file='page.tpl'}
{block name='page_content'}
    <form action="{$action_url}" method="post">
        <fieldset>
            <legend>{$l s='Soumettez votre demande SAV' mod='savform'}</legend>

            <div class="form-group">
                <label for="sav_type">{$l s='Type de problème' mod='savform'}</label>
                <select name="sav_type" id="sav_type" class="form-control">
                    <option value="">{l s='Sélectionnez un type' mod='savform'}</option>
                    <option value="delivery">{$l s='Problème de livraison' mod='savform'}</option>
                    <option value="product">{$l s='Problème de produit' mod='savform'}</option>
                    <option value="other">{$l s='Autre' mod='savform'}</option>
                </select>
            </div>

            <div class="form-group">
                <label for="sav_description">{$l s='Description' mod='savform'}</label>
                <textarea name="sav_description" id="sav_description" class="form-control" rows="5"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">{$l s='Soumettre' mod='savform'}</button>
        </fieldset>
    </form>

{/block}
