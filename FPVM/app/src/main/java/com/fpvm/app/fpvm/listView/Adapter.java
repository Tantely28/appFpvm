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

import java.util.List;

public class Adapter extends BaseAdapter {

    private Activity activity;
    private LayoutInflater inflater;
    private List<Item> items;

    public Adapter(Activity activity, List<Item> items){
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
            convertView=inflater.inflate(R.layout.custom_layout,null);

            TextView title= (TextView) convertView.findViewById(R.id.tv_title);
            TextView contenu= (TextView) convertView.findViewById(R.id.tv_news);

            //getting data for row
            Item item=items.get(position);
            //title
            title.setText(item.getTitle());
            //rate
            contenu.setText(item.getNews());
        }

        return convertView;
    }

}
