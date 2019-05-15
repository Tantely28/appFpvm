package com.fpvm.app.fpvm;

import android.app.ProgressDialog;
import android.content.Intent;
import android.os.Bundle;
import android.support.design.widget.NavigationView;
import android.support.v4.view.GravityCompat;
import android.support.v4.widget.DrawerLayout;
import android.support.v7.app.ActionBarDrawerToggle;
import android.support.v7.app.AppCompatActivity;
import android.support.v7.widget.Toolbar;
import android.view.Menu;
import android.view.MenuItem;
import android.widget.ListView;

import com.android.volley.Response;
import com.android.volley.VolleyError;
import com.android.volley.toolbox.JsonArrayRequest;
import com.fpvm.app.fpvm.listView.Adapter;
import com.fpvm.app.fpvm.listView.AppController;
import com.fpvm.app.fpvm.listView.Item;

import org.json.JSONArray;
import org.json.JSONException;
import org.json.JSONObject;

import java.util.ArrayList;
import java.util.List;

public class NavigationActivity extends AppCompatActivity
        implements
        NavigationView.OnNavigationItemSelectedListener {

    private SessionManager sessionManager;

    private static final String url="http://192.168.88.24:8000/api/read/vaovao";
    //http://192.168.88.24:8000
    private ProgressDialog dialog;
    private List<Item> array= new ArrayList<Item>();
    private ListView listView;



    @Override
    protected void onCreate(Bundle savedInstanceState) {
        super.onCreate(savedInstanceState);
        setContentView(R.layout.activity_navigation);

        Toolbar toolbar = (Toolbar) findViewById(R.id.toolbar);
        setSupportActionBar(toolbar);


        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        ActionBarDrawerToggle toggle = new ActionBarDrawerToggle(
                this, drawer, toolbar, R.string.navigation_drawer_open, R.string.navigation_drawer_close);
        drawer.addDrawerListener(toggle);
        toggle.syncState();

        NavigationView navigationView = (NavigationView) findViewById(R.id.nav_view);
        navigationView.setNavigationItemSelectedListener(this);



        //this.openFragement(new VaovaoFragment());

        //Session manager
        sessionManager=new SessionManager(this);
        sessionManager.getPseudo();

        //Method ListVaovao
        final Adapter adapter;

        listView = (ListView)findViewById(R.id.list_item);
        adapter = new Adapter(this,array);
        listView.setAdapter(adapter);

        dialog=new ProgressDialog(this);
        dialog.setMessage("Loading...");
        dialog.show();


        //Create volley request obj
        JsonArrayRequest jsonArrayRequest= new JsonArrayRequest(url, new Response.Listener<JSONArray>() {
            @Override
            public void onResponse(JSONArray response) {

                hideDialog();

                //parsing json
                for(int i=0;i<response.length();i++){
                    try {
                        JSONObject obj=response.getJSONObject(i);
                        Item item=new Item();

                        item.setTitle(obj.getString("titre"));
                        item.setNews(obj.getString("contenu"));

                        //add to array
                        array.add(item);

                    } catch (JSONException ex) {
                        ex.printStackTrace();
                    }
                }
                adapter.notifyDataSetChanged();


            }
        }, new Response.ErrorListener() {
            @Override
            public void onErrorResponse(VolleyError error) {

            }
        });
        AppController.getInstance().addToRequestQueue(jsonArrayRequest);

    }

    @Override
    public void onBackPressed() {
        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        if (drawer.isDrawerOpen(GravityCompat.START)) {
            drawer.closeDrawer(GravityCompat.START);
        } else {
            super.onBackPressed();
        }
    }

    @Override
    public boolean onCreateOptionsMenu(Menu menu) {
        // Inflate the menu; this adds items to the action bar if it is present.
        getMenuInflater().inflate(R.menu.navigation, menu);
        return true;
    }

    @Override
    public boolean onOptionsItemSelected(MenuItem item) {
        // Handle action bar item clicks here. The action bar will
        // automatically handle clicks on the Home/Up button, so long
        // as you specify a parent activity in AndroidManifest.xml.
        int id = item.getItemId();

        //noinspection SimplifiableIfStatement
        if (id == R.id.action_settings) {
            return true;
        }

        return super.onOptionsItemSelected(item);
    }

    @SuppressWarnings("StatementWithEmptyBody")
    @Override
    public boolean onNavigationItemSelected(MenuItem item) {

        // Handle navigation view item clicks here.
        int id = item.getItemId();
        if (id == R.id.nav_frag_vaovao) {
            Intent i =new Intent(getApplicationContext(),NavigationActivity.class);
            startActivity(i);
        } else if (id == R.id.nav_frag_adidy) {
            Intent i =new Intent(getApplicationContext(), AdidyActivity.class);
            startActivity(i);
        } else if (id == R.id.nav_frag_toriteny) {
            //Activity toriteny
        } else if (id == R.id.nav_frag_fijoroana) {
            //Activity fijorona
        } else if (id == R.id.nav_frag_user) {
            //Activity user
        } else if (id == R.id.nav_frag_logout) {
            sessionManager.logout();
            Intent i =new Intent(getApplicationContext(),MainActivity.class);
            startActivity(i);
            finish();

        }

        DrawerLayout drawer = (DrawerLayout) findViewById(R.id.drawer_layout);
        drawer.closeDrawer(GravityCompat.START);
        return true;
    }

    public void hideDialog(){
        if(dialog !=null){
            dialog.dismiss();
            dialog=null;
        }
    }
}
