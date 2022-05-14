<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class Addbshafferoauthtables extends Migration
{
    public function up()
    {
        if (!$this->db->tableexists('oauth_clients'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
                'client_id' => array('type' => 'VARCHAR', 'null' => FALSE),
                'client_secret' => array('type' => 'VARCHAR', 'null' => FALSE),
                'redirect_uri' => array('type' => 'VARCHAR', 'null' => TRUE),
                'grant_types' => array('type' => 'VARCHAR', 'null' => TRUE),
                'scope' => array('type' => 'VARCHAR', 'null' => TRUE),
                'user_id' => array('type' => 'int', 'unsigned' => TRUE, 'null' => TRUE)
            ));
            $this->forge->addForeignKey('user_id','users','id','RESTRICT','RESTRICT');
            // create table
            $this->forge->createtable('oauth_clients', TRUE);
        }

        if (!$this->db->tableexists('oauth_scopes'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
                'scope' => array('type' => 'VARCHAR', 'null' => FALSE),
                'is_default' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => TRUE)
            ));
            // create table
            $this->forge->createtable('oauth_scopes', TRUE);
        }

        if (!$this->db->tableexists('oauth_access_tokens'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
                'access_token' => array('type' => 'VARCHAR', 'null' => FALSE),
                'scope' => array('type' => 'VARCHAR', 'null' => TRUE),
                'expires' => array('type' => 'TIMESTAMP', 'null' => TRUE),
                //'user_id' => array('type' => 'int', 'unsigned' => TRUE, 'null' => TRUE),
                'user_id' => array('type' => 'VARCHAR', 'null' => FALSE),
                //'client_id' => array('type' => 'int', 'unsigned' => TRUE, 'null' => TRUE),
                'client_id'=> array('type' => 'VARCHAR', 'null' => FALSE)
            ));
            //$this->forge->addForeignKey('user_id','users','id','RESTRICT','RESTRICT');
            //$this->forge->addForeignKey('client_id','oauth_clients','id','RESTRICT','RESTRICT');
            // create table
            $this->forge->createtable('oauth_access_tokens', TRUE);
        }

        if (!$this->db->tableexists('oauth_refresh_tokens'))
        {
            // Setup Keys
            $this->forge->addkey('id', TRUE);

            $this->forge->addfield(array(
                'id' => array('type' => 'INT', 'unsigned' => TRUE, 'null' => FALSE, 'auto_increment' => TRUE),
                'refresh_token' => array('type' => 'VARCHAR', 'null' => FALSE),
                'scope' => array('type' => 'VARCHAR', 'null' => TRUE),
                'expires' => array('type' => 'TIMESTAMP', 'null' => TRUE),
                //'user_id' => array('type' => 'int', 'unsigned' => TRUE, 'null' => TRUE),
                'user_id' => array('type' => 'VARCHAR', 'null' => FALSE),
                //'client_id' => array('type' => 'int', 'unsigned' => TRUE, 'null' => TRUE),
                'client_id'=> array('type' => 'VARCHAR', 'null' => FALSE)
            ));
            // create table
            $this->forge->createtable('oauth_refresh_tokens', TRUE);
        }

    }

    public function down()
    {
        $this->forge->droptable('oauth_scopes', 'locale');
        $this->forge->droptable('oauth_access_tokens', 'locale');
        $this->forge->droptable('oauth_refresh_tokens', 'locale');
        $this->forge->droptable('oauth_clients', 'locale');

    }
}