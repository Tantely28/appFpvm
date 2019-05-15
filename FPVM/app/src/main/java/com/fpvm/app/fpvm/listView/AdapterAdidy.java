package com.fpvm.app.fpvm.listView;

import android.app.Activity;
import android.content.Context;
import android.view.LayoutInflater;
import android.view.View;
import android.view.ViewGroup;
import android.widget.BaseAdapter;
import android.widget.ListAdapter;
import android.widget.TextView;

import com.fpvm.app.fpvm.R;

import org.w3c.dom.Text;

import java.util.List;


public class AdapterAdidy extends BaseAdapter{

    private Activity activity;
    private LayoutInflater inflater;
    private List<ItemAdidy> items;

    public AdapterAdidy(Activity activity, List<ItemAdidy> items){
        this.activity=activity;
        this.items=items;
    }

    @Override
    public int getCount() {
        return items.size();
    }

    @Override
    public Object getItem(int position) {
        return items.get(position);
    }

    @Override
    public long getItemId(int position) {
        return position;
    }

    @Override
    public View getView(int position, View convertView, ViewGroup parent) {
        if(inflater==null){
            inflater=(LayoutInflater) activity.getSystemService(Context.LAYOUT_INFLATER_SERVICE);
        }
        if(convertView==null){
            convertView=inflater.inflate(R.layout.custom_layout_adidy,null);

            TextView nom= (TextView) convertView.findViewById(R.id.txt_nom);
            TextView date= (TextView) convertView.findViewById(R.id.txt_date);
            TextView volana= (TextView) convertView.findViewById(R.id.txt_volana);
            TextView vola= (TextView) convertView.findViewById(R.id.txt_vola);

            //getting data for row
            ItemAdidy item=items.get(position);
            //title
            nom.setText(item.getNom());
            //rate
            date.setText(item.getDate());
            //montant
            volana.setText(item.getVolana());
            //vola
            vola.setText(item.getVola());

        }

        return convertView;
    }

}
